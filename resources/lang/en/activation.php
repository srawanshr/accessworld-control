<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Activation Language Lines
    |--------------------------------------------------------------------------
    */

    'success' => 'Your account is activated.',
    'email'   => 'Account Not confirmed. <form style="display:inline" method="POST" action=":url"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn ink-reaction btn-xs btn-primary">Send activation code</button></form>'
];
