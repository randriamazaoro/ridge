<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
 

<div class="section container is-perfectly-centered" style="width:100%">
    <div style="width:450px">
        {{ $header ?? '' }}
        <div class="box">
            {{ Illuminate\Mail\Markdown::parse($slot) }} {{ $subcopy ?? '' }}
        </div>
        
        {{ $footer ?? '' }}
    </div>
</div>

</body>
</html>
