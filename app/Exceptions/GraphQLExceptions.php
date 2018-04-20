<?php

namespace App\Exceptions;

use Exception;
use Folklore\GraphQL\Error\ValidationError;
use Illuminate\Support\Facades\Config;

class GraphQLExceptions extends Exception
{

    public static function formatError(Exception $e)
    {

        $error = [
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        ];

        $previous = $e->getPrevious();
        if ($previous && $previous instanceof ValidationError) {
            $error['validation'] = $previous->getValidatorMessages();
        } else {
            if (Config::get('app.debug')) {
                $error = array_merge($error, [
                    'exception' => (string)$e,
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]);

                $locations = $e->getLocations();
                if (!empty($locations)) {
                    $error['locations'] = array_map(function ($loc) {
                        return $loc->toArray();
                    }, $locations);
                }

            } else {
                $error['message'] = 'server_error_production';
            }

        }
        return $error;
    }
}
