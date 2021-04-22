@extends('layouts.main')

@section('content')
<h2 class="faq-title">Frequently Asked Questions</h2>
<div class="panel bg1" id="faqlinks">
    <div class="inner">
        <div class="column1">
            <dl class="faq">
                <dt><strong>Login and Registration Issues</strong></dt>
                <dd><a href="#f0r0">Why do I need to register?</a></dd>
                <dd><a href="#f0r1">What is COPPA?</a></dd>
                <dd><a href="#f0r2">Why can’t I register?</a></dd>
                <dd><a href="#f0r3">I registered but cannot login!</a></dd>
                <dd><a href="#f0r4">Why can’t I login?</a></dd>
                <dd><a href="#f0r5">I registered in the past but cannot login any more?!</a></dd>
                <dd><a href="#f0r6">I’ve lost my password!</a></dd>
                <dd><a href="#f0r7">Why do I get logged off automatically?</a></dd>
            </dl>
        </div>
    </div>
</div>
<div class="panel bg2">
    <div class="inner">
        <div class="content">
            <h2 class="faq-title">Login and Registration Issues</h2>
            <dl class="faq">
                <dt id="f0r0"><strong>Why do I need to register?</strong></dt>
                <dd>You may not have to, it is up to the administrator of the board as to whether you need to register in order to post messages. However; registration will give you access to additional features not available to guest users such as definable avatar images, private messaging, emailing of fellow users, usergroup subscription, etc. It only takes a few moments to register so it is recommended you do so.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r1"><strong>What is COPPA?</strong></dt>
                <dd>COPPA, or the Children’s Online Privacy Protection Act of 1998, is a law in the United States requiring websites which can potentially collect information from minors under the age of 13 to have written parental consent or some other method of legal guardian acknowledgment, allowing the collection of personally identifiable information from a minor under the age of 13. If you are unsure if this applies to you as someone trying to register or to the website you are trying to register on, contact legal counsel for assistance. Please note that phpBB Limited and the owners of this board cannot provide legal advice and is not a point of contact for legal concerns of any kind, except as outlined in question “Who do I contact about abusive and/or legal matters related to this board?”.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r2"><strong>Why can’t I register?</strong></dt>
                <dd>It is possible a board administrator has disabled registration to prevent new visitors from signing up. A board administrator could have also banned your IP address or disallowed the username you are attempting to register. Contact a board administrator for assistance.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r3"><strong>I registered but cannot login!</strong></dt>
                <dd>First, check your username and password. If they are correct, then one of two things may have happened. If COPPA support is enabled and you specified being under 13 years old during registration, you will have to follow the instructions you received. Some boards will also require new registrations to be activated, either by yourself or by an administrator before you can logon; this information was present during registration. If you were sent an email, follow the instructions. If you did not receive an email, you may have provided an incorrect email address or the email may have been picked up by a spam filer. If you are sure the email address you provided is correct, try contacting an administrator.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />                           <dl class="faq">
                <dt id="f0r4"><strong>Why can’t I login?</strong></dt>
                <dd>There are several reasons why this could occur. First, ensure your username and password are correct. If they are, contact a board administrator to make sure you haven’t been banned. It is also possible the website owner has a configuration error on their end, and they would need to fix it.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r5"><strong>I registered in the past but cannot login any more?!</strong></dt>
                <dd>It is possible an administrator has deactivated or deleted your account for some reason. Also, many boards periodically remove users who have not posted for a long time to reduce the size of the database. If this has happened, try registering again and being more involved in discussions.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r6"><strong>I’ve lost my password!</strong></dt>
                <dd>Don’t panic! While your password cannot be retrieved, it can easily be reset. Visit the login page and click <em>I forgot my password</em>. Follow the instructions and you should be able to log in again shortly.<br />However, if you are not able to reset your password, contact a board administrator.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
            <hr class="dashed" />
            <dl class="faq">
                <dt id="f0r7"><strong>Why do I get logged off automatically?</strong></dt>
                <dd>If you do not check the <em>Remember me</em> box when you login, the board will only keep you logged in for a preset time. This prevents misuse of your account by anyone else. To stay logged in, check the <em>Remember me</em> box during login. This is not recommended if you access the board from a shared computer, e.g. library, internet cafe, university computer lab, etc. If you do not see this checkbox, it means a board administrator has disabled this feature.</dd>
                <dd><a href="#faqlinks" class="top2">Top</a></dd>
            </dl>
        </div>
    </div>
</div>
@endsection