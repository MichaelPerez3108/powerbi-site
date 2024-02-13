<?php

namespace App\Enums;

enum ObjetoType: string{
    case Report = 'report';
    case Folder = 'folder';
    case File = 'file';
    
}