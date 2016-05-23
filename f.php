<?php
    function http_parse_headers ($raw)
    {
        $k = '';
        $out = [];

        $exp = explode("\n", $raw);

        foreach ($exp as $v) {
            $exp = explode(':', $v, 2);

            if (isset($exp[1])) {
                /** Сonvert to 'Word-Word' */
                $k = strtolower($exp[0]);
                $k = preg_replace_callback('/\b[a-z]/', function ($m) { return strtoupper($m[0]); }, $k);

                $value = trim($exp[1]);

                if (!isset($out[$k])) $out[$k] = []; /** for in_array */
                if (!in_array($value, $out[$k])) $out[$k][] = $value; /** New element in array */
            } else {
                $value = trim($exp[0]);

                if (!empty($exp[0][0]) && $exp[0][0] == "\t") {
                    /** Index last element */
                    end($out[$k]);
                    $i = key($out[$k]);

                    $out[$k][$i] .= "\r\n\t". $value;
                } elseif (!$k)
                    $out['status'] = array($value);
            }
        }

        /** Array has only once element - convert in string */
        $out = array_map(function ($v) { return count($v) < 2 ? $v[0] : $v; }, $out);

        return $out;
    }
