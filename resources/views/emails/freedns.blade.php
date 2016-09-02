@extends('emails.master')

@section('title', 'AccessWorld Expiry')

@section('content')
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600"
           class="container">
        <tr>
            <td width="100%" colspan="3" align="center"
                style="padding-bottom:10px;padding-top:25px;">
                <div class="contentEditableContainer contentTextEditable">
                    <div class="contentEditable" align='center'>
                        <h2>Service Confirmation!</h2>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td width="100">&nbsp;</td>
            <td width="700" align="center">
                <div class="contentEditableContainer contentTextEditable">
                    <div class="contentEditable" align='left'>
                        <p>Hi {{ $freeDns->customer->display_name }},
                            <br/>
                            <br/>
                            Thank you for choosing our FREE DNS service for your domain registration , below is automatically generated verification code which is required for you to get your domain verified and proceed further.<br>
                            <br>
                            Code: {{ $freeDns->verification_code }}<br>
                            <br>
                            Copy the code provided above and paste it in the verification form which you can access by clicking the link below: <br>
                            <a href="https:\\localhost:8000\customer\freeDns\verification">Click to enter the code</a><br>
                            <br>
                            If you think that you shouldn't have received this email, you can safely ignore it. Thank you, <br>
                            AccessWorld Tech. Team<br>
                        </p>
                    </div>
                </div>
            </td>
            <td width="100">&nbsp;</td>
        </tr>
    </table>
@stop