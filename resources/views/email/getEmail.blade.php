<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Timezone</title>
    <style>

        h1,p,h3{
            text-align: center;
        }
        h1 {
            color : #FF2020;
            font-size: 40px;
        }

        h3 {

            color : #0B1C39;
            font-size: 30px;

        }
        p{
            color : #0B1C39;
            font-size: 20px;
        }

    </style>
</head>
<body>

<div>

    <h1>Hello, my name is {{$data['name']}}</h1>

    <h3>email: {{$data['email']}}</h3>

    <p>message: {{$data['message']}}</p>

</div>

</body>
</html>
