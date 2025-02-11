<?php

return [

    'aliases' => [
        // Other aliases...

      'IfoBaseUtilities\AbstractApiService' => \Packages\IfoBaseUtilities\Http\Services\AbstractApiService::class,
        'IfoBaseUtilities\AbstractModel' => \Packages\IfoBaseUtilities\Http\Services\AbstractModel::class,
        'IfoBaseUtilities\BaseValidator' => \Packages\IfoBaseUtilities\Http\Services\BaseValidator::class,
        'IfoBaseUtilities\DecryptRequest' => \Packages\IfoBaseUtilities\Http\Services\DecryptRequest::class,
        'IfoBaseUtilities\EncryptResponse' => \Packages\IfoBaseUtilities\Http\Services\EncryptResponse::class,
        'IfoBaseUtilities\HasNotDeletedScope' => \Packages\IfoBaseUtilities\Http\Services\HasNotDeletedScope::class,
        'IfoBaseUtilities\ResponseService' => \Packages\IfoBaseUtilities\Http\Services\Response::class,
    ],

];
