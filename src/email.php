<?php

if (!function_exists('is_email')) {
    function is_email($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }
}

if (!function_exists('to_rfc2822_email')) {
    function to_rfc2822_email(array $addresses)
    {
        $result = [];

        $addresses = !empty($addresses['address']) ? [$addresses] : $addresses;
        foreach ($addresses as $item) {
            if (!empty($item['address']) && is_email($item['address'])) {
                if (!empty($item['name'])) {
                    $result[] = "{$item['name']} <{$item['address']}>";
                } else {
                    $result[] = $item['address'];
                }
            }
        }

        return implode(', ', $result);
    }
}
