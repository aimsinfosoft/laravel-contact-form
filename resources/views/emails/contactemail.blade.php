<body style="font-family: 'Poppins', Arial, sans-serif">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <tr>
                        <td class="header" style="background-color: #345C72; padding: 40px; text-align: center; color: white; font-size: 24px;">
                            Thank you! for contacting us, we will reply promptly
                        </td>
                    </tr>
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                        Hello, !{{$data['name']}} <br>
                        <br>
                        Email: {{$data['email']}}
                        <br><br>
                        Message: {{$data['message'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 40px 0px 40px; text-align: center;">
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px;">
                                        <a href="{{route('contact.form')}}" target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Back To Contact Page</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="body" style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.6;">         
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td class="footer" style="background-color: #333333; padding: 40px; text-align: center; color: white; font-size: 14px;">
                        Copyright &copy; 2024 | Aims
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>