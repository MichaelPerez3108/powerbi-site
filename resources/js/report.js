import * as PbiClient from "powerbi-client";
import * as embedToken from "./embedConfigService";

// Bootstrap
//window["powerbi-client"] = PbiClient;
let models = PbiClient.models;

// Get container element
let reportContainer = document.getElementById("report-container");

// Initialize iframe for embedding report
powerbi.bootstrap(reportContainer, { type: "report" });

// get the embed data
let embedData = embedToken.getEmbedInfo({
    authorityUrl:
        import.meta.env.VITE_POWER_BI_AUTHORITY_URL ??
        "https://login.microsoftonline.com/",
    scopeBase:
        import.meta.env.VITE_POWER_BI_SCOPE_BASE ??
        "https://analysis.windows.net/powerbi/api/.default",
    powerBiApiUrl:
        import.meta.env.VITE_POWER_BI_API_URL ?? "https://api.powerbi.com/",
    tenantId: import.meta.env?.VITE_POWER_BI_TENANT_ID ?? "",
    workspaceId:
        reportContainer.getAttribute("x-data-workspace-id") ??
        import.meta.env.VITE_POWER_BI_WORKSPACE_ID ??
        "",
    clientId: import.meta.env.VITE_POWER_BI_CLIENT_ID ?? "",
    clientSecret: import.meta.env.VITE_POWER_BI_CLIENT_SECRET ?? "",
    reportId: reportContainer.getAttribute("x-data-report-id"),
});

// Create a config object with type of the object, Embed details and Token Type
let reportLoadConfig = {
    type: "report",
    tokenType: models.TokenType.Embed,
    accessToken: embedData.accessToken,

    // Use other embed report config based on the requirement. We have used the first one for demo purpose
    embedUrl: embedData.embedUrl[0].embedUrl,

    // Enable this setting to remove gray shoulders from embedded report
    // settings: {
    //     background: models.BackgroundType.Transparent
    // }
};

// Use the token expiry to regenerate Embed token for seamless end user experience
// Refer https://aka.ms/RefreshEmbedToken
tokenExpiry = embedData.expiry;

// Embed Power BI report when Access token and Embed URL are available
let report = powerbi.embed(reportContainer, reportLoadConfig);

// Clear any other loaded handler events
report.off("loaded");

// Triggers when a report schema is successfully loaded
report.on("loaded", function () {
    console.log("Report load successful");
});

// Clear any other rendered handler events
report.off("rendered");

// Triggers when a report is successfully embedded in UI
report.on("rendered", function () {
    console.log("Report render successful");
});

// Clear any other error handler events
report.off("error");

// Handle embed errors
report.on("error", function (event) {
    let errorMsg = event.detail;
    console.error(errorMsg);
    return;
});
