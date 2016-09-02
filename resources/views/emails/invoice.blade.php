@extends('emails.master')

@section('title', 'Order Invoice')

@section('content')
    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
        <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
            <table class="invoice" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 0 auto 40px;">
                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                        <h2 class="aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; box-sizing: border-box; font-size: 18px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 20px 0 20px;" align="center">
                            Order Invoice <br />
                            <small>{{ $invoice->date }}</small>
                        </h2>
                        Hi {{ $customer->display_name }},
                        <br />
                        <p>This email has been generated automatically to confirm the receipt of an order you placed online for
                        Access World service mentioned below. Generally it takes from a few to 24 hours to provision the service.</p>
                        <br />
                        @include('emails.partials.invoice.vps')
                        @include('emails.partials.invoice.web')
                        @include('emails.partials.invoice.email')
                        @include('emails.partials.invoice.domain')
                        @include('emails.partials.invoice.ssl')
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@stop