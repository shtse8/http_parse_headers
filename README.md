# http_parse_headers

<p align="center">
  <img src="https://mark.sylphx.com/api/v1/banner?type=void&theme=tokyonight&text=http+parse+headers&desc=Analog+function+pecl_http%2Fhttp_parser_headers&height=200&animation=rise&credit=0" alt="http_parse_headers — Sylphx Mark banner" width="100%" />
</p>

Analog function pecl_http/http_parser_headers

```php
  $headers = "content-type: text/html; charset=UTF-8\r\n".
    "Server: Nginx\r\n".
    "set-cookie: user=\r\n\tunknown\r\n".
    "set-cookie: pass=strong\r\n\tpassword\r\n".
    "Set-Cookie: id=1\r\n".
    "HOST:github.com";
  
  http_parse_headers($headers);
```

Output
```php
array (size=4)
  'Content-Type' => string 'text/html; charset=UTF-8' (length=24)
  'Server' => string 'Nginx' (length=5)
  'Set-Cookie' => 
    array (size=3)
      0 => string 'user=

	unknown' (length=15)
      1 => string 'pass=strong

	password' (length=22)
      2 => string 'id=1' (length=4)
  'Host' => string 'github.com' (length=10)
```
