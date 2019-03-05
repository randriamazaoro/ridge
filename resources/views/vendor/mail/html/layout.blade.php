<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background:#fefefe;margin:auto">
 

<div style="width:100%">
    <div style="width:450px;margin:auto;margin-top:50px">
        {{ $header ?? '' }}
        <div style="background:#fff; border:1px solid #ddd; padding:25px; border-radius:20px;">
            {{ Illuminate\Mail\Markdown::parse($slot) }} {{ $subcopy ?? '' }}
        </div>
        
        {{ $footer ?? '' }}
    </div>
</div>

</body>
</html>
