@if (session('registered'))
<div class="alert alert-success">
    @lang('auth.your registration was successful')
</div>
@endif
@if (session('wrongCredentials'))
<div class="alert alert-danger">
    @lang('auth.user or password was wrong')
</div>
@endif
@if (session('emailHasVerified'))
<div class="alert alert-success">
    @lang('auth.email has verified')
</div>
@endif
@if (session('resetLinkSent'))
<div class="alert alert-success">
    @lang('auth.reset link sent')
</div>
@endif
@if (session('resetLinkFailed'))
<div class="alert alert-danger">
    @lang('auth.reset link failed')
</div>
@endif
@if (session('cantChangePassword'))
<div class="alert alert-danger">
    @lang('auth.cantChangePassword')
</div>
@endif
@if (session('passwordChanged'))
<div class="alert alert-success">
    @lang('auth.passwordChanged')
</div>
@endif
@if (session('magicLinkSent'))
<div class="alert alert-success">
    @lang('auth.magicLinkSent')
</div>
@endif
@if (session('invalidToken'))
<div class="alert alert-danger">
    @lang('auth.invalidToken')
</div>
@endif
@if (session('cantSendCode'))
<div class="alert alert-danger">
    @lang('auth.cantSendCode')
</div>
@endif
@if (session('invalidCode'))
<div class="alert alert-danger">
    @lang('auth.invalidCode')
</div>
@endif
@if (session('twoFactorActivated'))
<div class="alert alert-success">
    @lang('auth.twoFactorActivated')
</div>
@endif
@if (session('twoFactorDeactivated'))
<div class="alert alert-success">
    @lang('auth.twoFactorDeactivated')
</div>
@endif
@if (session('codeResent'))
<div class="alert alert-success">
    @lang('auth.codeResent')
</div>
@endif