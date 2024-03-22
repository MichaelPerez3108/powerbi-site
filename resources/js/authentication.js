// ----------------------------------------------------------------------------
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT license.
// ----------------------------------------------------------------------------

import axios from "axios";

const getAccessToken = async function (config) {
    let response = await axios.post("/pbi/access-token", { config: config });
    return response.data.accessToken;
};

export { getAccessToken };
