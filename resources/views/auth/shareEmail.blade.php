<!doctype html>
<html lang="en-US">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                          <a href="https://rakeshmandal.com" title="logo" target="_blank">
                            journal
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">{{Auth::user()->name}} has shared Journal</h1>
                                            <img src="https://i.postimg.cc/Gp16W3N1/Share-link-pana.jpg" style="width: 70%">
                                        <!-- <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span> -->
                                        @if ($email_id)
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Hey User!!!.{{Auth::user()->name}} has been shared an Journal with you.A unique Link has been generated for you to see through it.Click the below link  to preview it.
                                        </p>
                                        <a href="/login" class="bg-emerald-800 hover:bg-emerald-600"
                                        style="text-decoration:none !important; font-weight:500; margin-top:35px; color:#1a1414;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login To Continue</a>
                                        @else
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Hey Guest!!!.{{Auth::user()->name}} has been shared an Journal with you.A unique Link has been generated for you to see through it.Click the below link  to preview it.
                                        </p>
                                        <a href="{{route('guest.view.get',$post_id) }}" class="bg-emerald-800 hover:bg-emerald-600"
                                        style="text-decoration:none !important; font-weight:500; margin-top:35px; color:#1a1414;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">View Shared Journal</a>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
