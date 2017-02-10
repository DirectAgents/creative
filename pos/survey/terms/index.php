<?php require_once '../base_path.php'; ?>

<script src="https://use.typekit.net/oos2wfr.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>
<html itemscope itemtype="http://schema.org/Product">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">

    <title>Gust Launch</title>

    <link rel="icon" href="../public/img/favicon.ico" type="image/x-icon"/>

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="The modern way to start a scalable, high-growth business" />

    <meta name="google"
        content="nositelinkssearchbox" />
    <meta itemprop="name"
        content="Gust Launch">
    <meta itemprop="image"
        content="/public/img/logo.png">

    <meta name="twitter:site"
        content="@gustly">
    <meta name="twitter:title"
        content="Gust Launch">
    <meta name="twitter:description"
        content="The modern way to start a scalable, high-growth business">
    <meta name="twitter:creator"
        content="@gustly">

    <meta property="og:url"
        content="https://launch.gust.com/start">
    <meta property="og:title"
        content="Gust Launch">
    <meta property="og:image"
        content="https://launch.gust.com/public/img/logo-gustlaunch-og.png">
    <meta property="og:image:width"
        content="1200">
    <meta property="og:image:height"
        content="630">
    <meta property="og:description"
        content="The modern way to start a scalable, high-growth business">
    <meta property="og:site_name"
        content="Gust Launch">
    <meta property="og:locale"
        content="en_US">
    <meta property="article:author"
        content="https://www.facebook.com/Gust-246116808757618">
    <meta property="article:section"
        content="Technology">

    <script src="https://cdn.optimizely.com/js/2761650875.js"></script>
    <script src="https://code.angularjs.org/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-route.js"></script>

    

<link href="../css/launch.css" rel="stylesheet">

<link rel="stylesheet" media="all" href="../assets/application-d939c3182b808a58e625b4260b6955c9.css" />

</head>

<body
  ng-app="app"
  ng-class="{loaded: vm.loaded, IE11: vm.IE11}"
  ng-controller="appController as vm">

  <nav shrink>
  <svg class="logo" viewBox="0 0 415.8 57">
    <g class="swoosh">
    	<path d="M119.2,0.8c-0.3,0.3-18.6,21.3-45.6,36.6c-0.2,0.1-0.4-0.2-0.2-0.3c9-6.6,16.8-14,23.4-20.8
    		c1.5-1.6,1.5-4.1-0.1-5.6l-1.5-1.5C84.2,20.5,69.5,35,51.2,44.3C51,44.4,50.8,44.1,51,44c8.2-5.6,16.5-12.8,23.7-19.9
    		c1.6-1.5,1.6-4.1,0-5.6l-1.5-1.5C60.9,29.2,47.4,41.6,33.8,47.9c-0.2,0.1-0.4-0.2-0.2-0.3c8.1-5.2,16.8-13.2,21.2-17.4
    		c1.6-1.5,1.6-4,0.1-5.6l-1.2-1.2c0,0-19.1,19.5-30.2,24.6c-10.7,4.9-18.2,4.8-22.1,4c-0.4-0.1-0.5,0.4-0.2,0.6
    		c4.4,1.7,12.8,4.1,25,3.7c34.7-1,69.4-22.1,94.6-48.4c1.6-1.6,1.4-4.3-0.3-5.8L119.2,0.8z"/>
    </g>
    <g class="launch">
    	<path d="M261.3,14.1h2.6v25.6h13v2.4h-15.6V14.1z"/>
    	<path d="M292.6,14.1h2.7l11.8,28h-2.9l-3-7.4h-14.8l-3.2,7.4h-2.7L292.6,14.1z M293.8,17l-6.5,15.3h12.8L293.8,17z"/>
    	<path d="M330.4,31.4c0,1.5-0.2,2.9-0.5,4.3c-0.3,1.4-0.9,2.6-1.7,3.6c-0.8,1.1-1.9,1.9-3.2,2.5
    		c-1.3,0.6-2.9,0.9-4.8,0.9s-3.5-0.3-4.8-0.9c-1.3-0.6-2.4-1.5-3.2-2.5c-0.8-1.1-1.4-2.3-1.7-3.6c-0.3-1.4-0.5-2.8-0.5-4.3V14.1h2.6
    		v16.6c0,1,0.1,2.1,0.3,3.2c0.2,1.1,0.5,2.2,1.1,3.2c0.5,1,1.3,1.8,2.3,2.4c1,0.6,2.3,0.9,3.9,0.9s2.9-0.3,3.9-0.9
    		c1-0.6,1.8-1.4,2.3-2.4c0.5-1,0.9-2,1.1-3.2c0.2-1.1,0.3-2.2,0.3-3.2V14.1h2.6V31.4z"/>
    	<path d="M337,14.1h3.4l17,24.5h0.1V14.1h2.6v28h-3.4l-17-24.5h-0.1v24.5H337V14.1z"/>
    	<path d="M389.9,37.7c-1.3,1.8-2.9,3.1-4.7,3.9c-1.8,0.8-3.7,1.2-5.7,1.2c-2.1,0-4.1-0.4-5.9-1.1
    		c-1.8-0.7-3.3-1.7-4.6-3c-1.3-1.3-2.3-2.9-3-4.7c-0.7-1.8-1.1-3.8-1.1-5.9s0.4-4.1,1.1-5.9c0.7-1.8,1.7-3.3,3-4.6
    		c1.3-1.3,2.8-2.3,4.6-3.1c1.8-0.7,3.7-1.1,5.9-1.1c1.9,0,3.7,0.3,5.3,1c1.6,0.7,3.1,1.8,4.3,3.4l-2.1,1.8c-0.9-1.3-2-2.3-3.3-2.9
    		c-1.4-0.6-2.7-0.9-4.2-0.9c-1.8,0-3.5,0.3-4.9,0.9c-1.5,0.6-2.7,1.5-3.7,2.6c-1,1.1-1.8,2.4-2.4,3.9c-0.6,1.5-0.8,3.1-0.8,4.9
    		c0,1.7,0.3,3.4,0.8,4.9c0.6,1.5,1.3,2.8,2.4,3.9c1,1.1,2.3,2,3.7,2.6c1.5,0.6,3.1,0.9,4.9,0.9c0.7,0,1.4-0.1,2.2-0.3
    		c0.8-0.2,1.5-0.4,2.2-0.8c0.7-0.4,1.4-0.8,2.1-1.3c0.7-0.5,1.2-1.2,1.7-2L389.9,37.7z"/>
    	<path d="M395,14.1h2.6v12.3h15.6V14.1h2.6v28h-2.6V28.8h-15.6v13.3H395V14.1z"/>
    </g>
    <g class="gust">
    	<path d="M151.5,41.9c0,8.4-6.1,14.4-15.3,14.4c-5.3,0-9.7-1.4-13.7-5l3.6-4.5c2.8,3,5.9,4.5,10,4.5
    		c7.9,0,10.1-5,10.1-9.7v-4.1h-0.2c-2,3.4-5.8,5-9.7,5c-8.2,0-14.3-6.2-14.2-14.3c0-8.3,5.5-14.7,14.2-14.7c3.8,0,7.7,1.7,9.7,4.7
    		h0.1v-4h5.3V41.9z M127.8,28.1c0,5.7,3.5,9.4,9.2,9.4c5.7,0,9.2-3.7,9.2-9.4c0-5.7-3.5-9.7-9.2-9.7
    		C131.4,18.4,127.8,22.4,127.8,28.1z"/>
    	<path d="M187.3,42.1H182v-4.3h-0.1c-1.4,2.9-4.9,5-9.2,5c-5.4,0-10.1-3.2-10.1-10.7v-18h5.3v16.5c0,5.3,3,7.2,6.4,7.2
    		c4.4,0,7.8-2.8,7.8-9.3V14.1h5.3V42.1z"/>
    	<path d="M213.1,21.1c-1.2-1.5-3.1-2.8-5.7-2.8c-2.5,0-4.7,1.1-4.7,3.1c0,3.4,4.8,3.8,7.1,4.4c4.6,1.1,8.1,2.9,8.1,8.1
    		c0,6.3-5.8,8.8-11.3,8.8c-4.6,0-8-1.2-10.8-5l4-3.3c1.7,1.7,3.7,3.3,6.8,3.3c2.7,0,5.7-1.1,5.7-3.5c0-3.2-4.4-3.8-6.7-4.3
    		c-4.5-1.1-8.6-2.6-8.6-8c0-5.8,5.4-8.6,10.6-8.6c3.7,0,7.5,1.3,9.6,4.6L213.1,21.1z"/>
    	<path d="M242.4,18.7h-7.6v12.7c0,3.1,0,6.4,4,6.4c1.2,0,2.7-0.2,3.8-0.8v4.8c-1.2,0.7-3.7,0.9-4.8,0.9
    		c-8.2,0-8.3-5-8.3-9.5V18.7h-6.1v-4.6h6.1V6.3h5.3v7.8h7.6V18.7z"/>
    </g>
  </svg>
  
  <span class="amp"
    ng-style="vm.color"
    ng-if="vm.discount">
    &amp;
  </span>
  
  <div class="partner" ng-if="vm.discount">
    <img ng-src="/public/img/launch/{{vm.partnerImg}}" alt="{{vm.partner}}">
  </div>
    <a class="signup" href="startup/signup/">
      Sign Up
    </a>
    <a class="login" href="startup/login/" target="_self">Login</a>
  </nav>

 
  
  
  <section class="privacy-policy">
     <div class="col-md-9">
<h1 class="gust-margin--large--bottom gust-margin--large--top">
Privacy Policy
</h1>
<p><b>Scope of this Privacy Policy</b>&nbsp;
</p>
<p>Gust, Inc. respects your privacy and is committed to protecting it. This privacy policy applies to www.gust.com (‘Gust Platform’) owned and operated by Gust, Inc. (‘Gust’, "We", "Us" or "Our").&nbsp; This Privacy Policy describes Gusts’ policies and procedures on the collection, use and disclosure of your personal data when you use the Gust Platform. It also describes the choices available to you regarding the use of, your access to, and how to update and correct your personal data. We will not use or share your confidential information with anyone except as described in this Privacy Policy. This Privacy Policy does not apply to information we collect from other sources.&nbsp;Information which you do not designate as confidential may be publicly available and disclosed.&nbsp;Capitalized terms that are not defined in this Privacy Policy have the meaning given them in Gusts’ Terms of Service .&nbsp;</p>
<p>
<br>
</p>
<p><b>The Gust Platform</b>&nbsp;
</p>
<p>The Gust Platform offers a set of tools for investors and for entrepreneurs on which they may do many things, including exchange information. Gust also allows access to the Gust Platform to Organizations for use by their members.</p>
<p>
<br>
</p>
<p><b>EU – U.S. Privacy Shield</b></p>
<p>
Gust participates in and has certified its compliance with the EU – U.S. Privacy Shield Framework.&nbsp;Gust is committed to subjecting all personal data received from European Union (EU) member countries, in reliance on the Privacy Shield Framework, to the Framework’s applicable Principles. To learn more about the Privacy Shield Framework, visit the U.S. Department of Commerce’s Privacy Shield List.
<a href="https://www.privacyshield.gov/list">https://www.privacyshield.gov/list</a>
</p>
<p>Gust is responsible for the processing of personal data it receives, under the Privacy Shield Framework, and subsequently transfers to a third party acting as an agent on its behalf. Gust complies with the Privacy Shield Principles for all onward transfers of personal data from the EU, including the onward transfer liability provisions.</p>
<p>With respect to personal data received or transferred pursuant to the Privacy Shield Framework, Gust is subject to the regulatory enforcement powers of the U.S. Federal Trade Commission.&nbsp;In certain situations, Gust may be required to disclose personal data in response to lawful requests by public authorities, including to meet national security or law enforcement requirements.</p>
<p>
If you have an unresolved privacy or data use concern that we have not addressed satisfactorily, please contact our U.S.-based third party dispute resolution provider (free of charge) at
<a href="https://feedback-form.truste.com/watchdog/request">https://feedback-form.truste.com/watchdog/request.</a>
</p>
<p>
Under certain conditions, more fully described on the Privacy Shield website
<a href="https://www.privacyshield.gov/article?id=How-to-Submit-a-Complaint">https://www.privacyshield.gov/article?id=How-to-Submit-a-Complaint,</a>
you may invoke binding arbitration when other dispute resolution procedures have been exhausted.
</p>
<p><b>This Privacy Policy applies only to your relationship with Gust.&nbsp;</b>It does not apply to the interactions that you have with any other individual, entity, investor or other group through the Gust Platform. For example, the administrator of an Organization has the ability to disclose or share with other members of the Organization any information that you submit to the Gust Platform.&nbsp;<b>Gust has no control over this disclosure or sharing, and is not responsible for it.&nbsp;</b>The protection of your personal data when you interact with an Organization through the Gust Platform is governed solely by any agreements that you may enter into with the Organization and is beyond the scope of this Privacy Policy.&nbsp;
</p>
<p>This Privacy Policy describes the types of information we may collect from you or that you may provide when you use the Gust Platform, and our practices for collecting, using, maintaining, protecting and disclosing that information.</p>
<p>This Privacy Policy applies to information we collect:</p>
<p>•    On the Gust Platform;</p>
<p>•    In e-mail, text and other electronic messages between you and Gust, on the Gust Platform or otherwise; and</p>
<p>•    When you interact with our links and applications on third-party websites and services if they include a link to this Privacy Policy.</p>
<p>It does not apply to information collected by:</p>
<p>•    Us offline or through any other means, including on any other website operated by Gust or any third party (including our affiliates and subsidiaries); or &nbsp;&nbsp;</p>
<p>•    Any third party (including our affiliates and subsidiaries), including through any application or content (including advertising) that may link to or be accessible from or on the Gust Platform.</p>
<p>Please read this Privacy Policy carefully to understand our policies and practices regarding your information and how we will treat it. If you do not agree with our policies and practices, your choice is not to use the Gust Platform. By accessing or using the Gust Platform, you agree to this Privacy Policy.&nbsp;</p>
<p>
<br>
</p>
<p><b>What is “personal data”?</b>&nbsp;
</p>
<p>"Personal data" is any data that (1) is recorded in any form, (2) is about or pertains to a specific individual and (3) can be linked to that individual. For example, and without limitation, your first and last names, address, email address, telephone number, and other contact information, and the deals in which you have participated are "personal data."</p>
<p>
<br>
</p>
<p><b>What kind of personal data is collected?</b>&nbsp;
</p>
<p>We collect personal data at different stages of your use of the Gust Platform.</p>
<p><b>When you visit gust.com -&nbsp;</b>If you visit www.gust.com or use an interface which interacts with gust.com, whether or not you sign-in as a registered user, we collect your IP address, the location of your Internet Service Provider, the type and version of Internet browser that you are using, and the website from which you came. We also collect information regarding your site usage, such as the time spent on a page and the number of pages you viewed.&nbsp;
</p>
<p><b>When you set up an account -</b>When you set up your account, you will be required to provide certain personal data including your name and email address. You may also be invited to provide optional personal data, such as biography, photograph, postal address or phone number.&nbsp;If you choose to do so, our use of your personal data shall be governed by this Privacy Policy.&nbsp;
</p>
<p><b>When you interact with the Gust Platform -</b>We also collect personal data that you provide when you interact with the Gust Platform such as, for example, by sending a message or uploading documents, or when exchanging correspondence with us such as through support emails.&nbsp;
</p>
<p><b>When you use your account -</b>We collect information that you provide or create when you use your account:&nbsp;
</p>
<p>
<b>•    If you are classified as an Investor,</b>
you may record in your profile within your Organization’s information about yourself, such as your contact information, picture, biography, experience, or other groups to which you belong.&nbsp;While the Organization’s name will be name public, no investor information will be publicly disclosed.&nbsp;
</p>
<p>
<b>•    If you are an entrepreneur,</b>
and you represent a company that is seeking investors, you may record information about yourself, your company, and your company’s management team. You may also include a video recording or picture.&nbsp;All information you put onto the Gust Platform is confidential unless you decide to share any of it.&nbsp;
</p>
<p>If you provide any information about or personal data of a third party (such as a person's name or photograph), you are representing to Gust that you have all necessary authority and/or have obtained all necessary consents from such individual to enable Gust to collect, use and disclose his or her personal data as set forth in this Privacy Policy.&nbsp;If we receive a written complaint or direction from the person, we will take down his or her information and notify you that we have done so.&nbsp;</p>
<p>
<br>
</p>
<p><b>How is personal data collected?</b>&nbsp;
</p>
<p>We collect personal data directly from you when you provide it through your use of the Gust Platform, such as in emails or when you fill out forms that are displayed on the Gust Platform.</p>
<p>We also use cookies that are sent to your computer, or action tags that are placed on the Gust Platform. For additional explanation on cookies and action tags, see&nbsp; Cookies and Action Tags.&nbsp;</p>
<p>
<br>
</p>
<p><b>For what purpose will my personal data be used?</b>&nbsp;
</p>
<p>Gust uses your personal data to maintain your account and to provide you with the group and deal-flow management and other services offered on the Gust Platform. We also use your personal data to respond to requests that you make of us, and to contact you and to provide you with information that we believe may be of interest to you.</p>
<p>We may also use your name and contact information to make queries to social networking and other sites, such as LinkedIn, for a variety of purposes, including, but not limited to, verifying your identity, and showing you how you are linked or connected to other individuals who are also Gust users.</p>
<p>Your personal data may also be shared with companies in the Gust family of companies or to third parties as described below.</p>
<p>
<br>
</p>
<p><b>Can third parties see my personal data?</b>&nbsp;
</p>
<p>
<b>•    If you are an investor</b>
- The Gust Platform allows the Organization Administrator of an Organization the ability to set certain settings in the profile of the members of the Organization . Thus, for each Organization, the Administrator decides which information is available for access or review by entrepreneurs and/or other Organizations, and which information is not to be disclosed, or is disclosed to selected entrepreneurs and/or other Organizations, according to the policies of the Organization.&nbsp;Please note that (1)&nbsp;<b>the default settings that are set by an Organization Administrator may change from time to time;&nbsp;</b>(2) each Organization may opt for different default settings.&nbsp;While the Gust Platform includes initial defaults, Gust has
<b>no control over the choice of a setting or the change in a default setting by an Organization’s Administrator.</b>&nbsp;
</p>
<p><b>• If you are an entrepreneur</b>- If you are an entrepreneur and you have posted or uploaded information about you and/or your team, this information is disclosed to the Organizations to whom you have chosen to disclose the information.&nbsp;
</p>
<p>
<br>
</p>
<p><b>With whom may Gust share personal data?</b>&nbsp;
</p>
<p>Under certain business or legal conditions, Gust may have to disclose your personal data to others as follows:</p>
<p><b>• Within the Gust Family</b>– Gust may now or in the future have a parent, subsidiary or related company or companies within the Gust family of companies.&nbsp;Gust has the right to share all personal data with all such affiliated companies.&nbsp;
</p>
<p>
<b>•    Service Providers</b>
- Gust may engage other companies and individuals to perform necessary business functions on behalf of Gust (e.g. customer service or email provider). If it is necessary to perform these functions, these companies or individuals may have access to personal data of our users. These service providers have agreed not to use the personal data for any other purpose other than providing the required services.&nbsp;
</p>
<p><b>• Legally Required Disclosure -</b>Under certain circumstances, disclosure of your personal data may be required by law. Gust may disclose your personal data (1) if, in its own best judgment, it is required by law to do so in order to comply with a facially valid judicial or governmental subpoena, warrant, bankruptcy proceedings, or other order, or (2) to a government institution that has asserted its lawful authority to obtain the information, or (3) when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud.&nbsp;
</p>
<p>
<b>•    Change of Ownership</b>
- If ownership of Gust changes as a result of a merger, acquisition, or transfer to another company, your personal data may be transferred to the successor entity. If such transfer takes place, you will be notified of any material changes to the Privacy Policy and provided with the ability to opt-out of the transfer of your personal data to the successor entity.&nbsp;
</p>
<p>
<b>
&nbsp;Sharing with 3
<sup>rd</sup>
Parties&nbsp;
</b>
</p>
<p>
3
<sup>rd</sup>
Parties are companies unaffiliated with the Gust Platform.&nbsp; We may share your personal data with 3rd parties if given permission by you so that they can market their products or services to you. If you do not want us to share your personal data with 3rd parties after giving us permission to do so, contact us at support@gust.com.
</p>
<p>
<br>
</p>
<p><b>Can I access or change my personal data?</b>&nbsp;
</p>
<p>Upon request Gust will provide you with information about whether we hold any of your personal information. If your personal data changes, you may correct, update, or amend by making the change on our member information page or by emailing our Customer Support at support@gust.com or by contacting us by postal mail at the contact information listed below.&nbsp; If you wish to delete/remove/deactivate your profile or remove your testimonial from our site please email us at support@gust.com.&nbsp; We will respond to your request to access within 30 days.</p>
<p>
<b>Data Retention</b>
</p>
<p>We will retain your information for as long as your account is active to provide you services.&nbsp; We will retain and use your information as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</p>
<p>For auditing and security purposes, Gust keeps a log of all users' activities, which is retained in its archives as necessary for Gust to fulfill its obligations. Users mayhave access to the personal data that pertain to them. However, because the administrative and technical burden associated with the retrieval of these archived data is substantial, Gust charges a fee for this effort in a manner that is consistent with its actual cost. In addition, each user's right of access may be limited to the extent that providing access might infringe on a third party's privacy rights. Requests for access to this archived information are handled on a case-by-case basis, after Gust has verified the identity of the requestor. Inquiries should be made as provided in the section.</p>
<p>
<br>
</p>
<p><b>Can I have my personal data deleted?</b>&nbsp;
</p>
<p>You can delete any personal data that is recorded in the profile that you create for yourself as an investor or for your company, or as an entrepreneur.</p>
<p>
<b>Social Media Widgets</b>
</p>
<p>Our Web site includes Social Media Features, such as the Facebook and Twitter button. These Features may collect your IP address, which page you are visiting on our site, and&nbsp;may set a cookie to enable the Feature to function properly. Social Media Features and Widgets are either hosted by a third party or hosted directly on our Site. Your interactions with these Features are governed by the privacy policy of the company providing it.</p>
<p>
<b>Single Sign-On</b>
</p>
<p>You can log in to our site using sign-in services such as LinkedIn or an Open ID provider. These services will authenticate your identity and provide you the option to share certain personal data with us such as your name and email address to pre-populate our sign up form.&nbsp; Services like LinkedIn give you the option to post information about your activities on this Web site to your profile page to share with others within your network.&nbsp;</p>
<p>
<b>Testimonials</b>
</p>
<p>We display video testimonials of satisfied customers on our site in addition to other endorsements.&nbsp; With your consent we may post your video testimonial along with your name.&nbsp; If you wish to update or delete your testimonial, you can contact us at support@gust.com.&nbsp;</p>
<p>
<b>Invite Members</b>
</p>
<p>
If you choose to invite a user to our platform, we will ask you for a name and email address.&nbsp; We will automatically send your invite a one-time email inviting him or her to visit the site.&nbsp; Gust stores this information for the sole purpose of sending this one-time email and tracking the success of invites claimed. Your invitee may contact us at
<a href="mailto:support@gust.com">support@gust.com</a>
to request that we remove this information from our database.
</p>
<p>
<br>
</p>
<p><b>What is Aggregated Data, and how is it used?</b>&nbsp;
</p>
<p>Data aggregation is a process in which information is gathered and expressed in a summary form for purposes such as statistical analysis, in order to obtain information about a particular group based on specific variables. Data used for aggregation purposes are collected in a form that removes all identifiers, and may be combined with other data for which all identifiers have also been removed. Gust uses aggregated data to generate accurate metrics about the early stage private equity industry.</p>
<p>Aggregated data are packaged and licensed to third parties such as governments, economic development agencies and financial institutions. Examples of aggregated data may include:</p>
<p>•    Data about the early equity space, such as number of deals in a month-to-month or quarter-to-quarter basis at various generic stages of the funding process (e.g. new deals, in-progress deals, inactive deals, and invested deals).</p>
<p>•    Data about industries and geographies related to companies seeking investors and those successfully obtaining investments.</p>
<p></p>
<p>
<br><b>What is Website Data, and how is it used?</b>&nbsp;
</p>
<p>Website data is aggregated data about the overall traffic to, and usage of the Gust Platform. Examples include the number of visitors to the gust.com website and the number of registered users of the Gust Platform. Gust may extract and use website data for internal purposes, in order to analyze the performance of the Gust Platform and applications. For example, we may use these data for traffic analysis and business decision making, in order to determine how we can improve our site or its functionalities.</p>
<p>The statistics generated in this manner contain no personal data and cannot be used to gather any information about individual visitors to the site.</p>
<p><b>Cookies and other Tracking Technologies</b></p>
<p>
We and our partners use cookies or similar technologies to analyze trends, administer the website, track users’ movements around the website, and to gather demographic information about our user base as a whole.
&nbsp;
</p>
<p><b>• Cookies&nbsp;</b>&nbsp;
</p>
<p>Gust uses 'cookies.' A cookie is a small amount of data sent to a user's web browser from a web server, which is then stored on the user's hard drive. Cookies are used to make site navigation easier, and can help recognize a returning visitor. Gust's cookies do not generate any personal data, do not read personal data from your computer, and are not tied to any personal data.&nbsp;Most browsers automatically accept cookies. You can instruct your browser, by editing its options, to stop accepting cookies, or to prompt you before accepting cookies from the sites that you visit. If you decide not to accept our cookies, some or all features of the site may not be available because navigation on the site is facilitated by cookies.&nbsp;You can delete cookies from your computer at any time. You can learn more about cookies by visiting: http://www.allaboutcookies.org &nbsp;or www.networkadvertising.org .&nbsp;</p>
<p><b>• Action Tags&nbsp;</b>&nbsp;
</p>
<p>Gust uses action tags. An action tag is a small piece of code that is placed on a webpage or in an email in order to track the pages viewed or the messages opened, the date and time when someone visited our website, the website from which the visitor came, the type of browser used, and the domain name and address of the user's Internet Service Provider.&nbsp;Action tags allow us to better understand how users and visitors use our site or browse through our pages, so that we can improve access to and navigation through the site, add or modify pages, according to our user's patterns. Action tags cannot be removed or deleted by our users, because they are part of the programming of a webpage.</p>
<p><b>• Log Files&nbsp;</b>&nbsp;
</p>
<p>Log file information is automatically reported by your browser each time you access a web page. When you use the Gust Platform, our servers automatically record certain information that your web browser sends out whenever you visit any website. These server logs may include information such as your web request, IP address, browser type, referring/exit pages, operating system, date/time stamp, the files viewed on our site (e.g., HTML pages, graphics, etc.) and URLs, number of clicks, domain names, landing pages, pages viewed, and other similar information.</p>
<p><b>• Web Beacons&nbsp;</b>&nbsp;
</p>
<p>When you use the Gust Platform, we may employ web beacons, which are used to track the online usage patterns of Users anonymously. No personal data from your account is collected using these beacons. In addition, we may also use web beacons in HTML-based emails sent to Users to track which emails are opened by recipients.</p>
<p>The use of cookies or similar technologies by our partners is not covered by our privacy policy.&nbsp; We do not have access or control over these cookies or similar technologies.</p>
<p><b>• Behavioral Targeting</b>&nbsp;
</p>
<p>
We partner with a third party to either display advertising on our website or to manage our advertising on other sites. Our third party partner may use cookies or similar technologies in order to provide you advertising based upon your browsing activities and interests. If you wish to opt out of interest-based advertising click
<a href="http://preferences-mgr.truste.com">here</a>
(or if located in the European Union click
<a href="http://www.youronlinechoices.eu/">here</a>
). Please note you will continue to receive generic ads.
</p>
<p><b>• Do Not Track Signals&nbsp;</b>&nbsp;
</p>
<p>Gust does not track or use Do Not Track signals. &nbsp;</p>
<p>
<br>
</p>
<p><b>What security measures are in place to protect my personal data?</b>&nbsp;
</p>
<p>Gust uses physical, technical, and administrative procedures in order to safeguard and protect personal data from loss, misuse, unauthorized access, disclosure, alteration, and destruction. However, while we do our best to implement reasonable security measures, we do not guarantee that our safeguards will always work.</p>
<p>Gust uses industry-standard technological means to protect your personal data while in transit through the Internet. We use encryption and a comprehensive authentication protocol to provide reasonable security. However, please remember that no security system on the Internet is perfect.&nbsp; If you have any questions about security on our Web site, you can contact us at support@gust.com.</p>
<p>
<br>
</p>
<p><b>What about Uploaded Documents?</b>&nbsp;
</p>
<p>Documents that are uploaded to the Gust Platform for sharing are stored at a third party data-storage service. All uploads and downloads are transmitted through the web between users and the data storage service using the same encryption techniques as those that are used with personal data. However, uploaded documents are neither stored redundantly, nor backed up. Therefore, we recommend that Gust users keep back-up copies of their documents if they upload them to the gust.com website.</p>
<p>
<br>
</p>
<p><b>When will Gust contact me?</b>&nbsp;
</p>
<p>Gust will communicate with you in response to your requests for service or customer support. We will contact you by phone or by email, according to your preference.</p>
<p>Gust will send you service-related emails if it becomes necessary to do so. Gust may send you an email in order to notify you of updates to our Privacy Policy, Terms of Service, or other agreement that you have with Gust.&nbsp; Gust may also send you an email in order to notify you of new products, or services or features. If you no longer wish to receive these emails, you may opt out of them by clicking on the unsubscribe button&nbsp; For system generated emails (in response to you or other Gust users actions) the majority of them are configurable under settings. If you do not want to receive any emails from Gust, you can opt out by deactivating your account by contacting support@gust.com</p>
<p><b>Links to other websites</b>&nbsp;
</p>
<p>Gust may provide links to other websites. We are not responsible for the privacy practices or content of these sites. In order to safeguard your privacy, please review the privacy policies of any sites that you may visit before providing any personal data to these third party sites.</p>
<p><b>Limitation of Liability</b>&nbsp;
</p>
<p>Gust exercises reasonable efforts to safeguard the security and confidentiality of your personal data; however, transmissions protected by industry standard technology and administered by humans cannot be guaranteed to be secure. Gust will not be liable for unauthorized disclosure of personal data that occurs through no fault of Gust including, but not limited to, errors in transmission, access to your account by anyone uses your user ID and password, your failure to comply with your security obligations, and the unauthorized acts of Gust's employees.</p>
<p>
<br>
</p>
<p>
<br>
</p>
<p><b>Choice</b>&nbsp;
</p>
<p>If at any time Gust wishes to disclose, or use your personal data in a way, or for a purpose other than as described in this Privacy Policy, Gust will give you the opportunity to choose (opt out) whether your personal data (1) may be disclosed to a third party and (2) may be used for a purpose other than the purposes that are set forth in this Privacy Policy.&nbsp; If you do not want us to share your personal data with these members, contact us at support@gust.com. &nbsp;</p>
<p>California Privacy Rights&nbsp;</p>
<p>California Civil Code Section § 1798.83 permits users of the Gust Platform that are California residents to request certain information regarding our disclosure of personal data to third parties for their direct marketing purposes. To make such a request, please send an e-mail to support@gust.com or write us at: Gust 44 West 28th Street, New York, NY 10001 USA.&nbsp;</p>
<p>
<br>
</p>
<p>
<br>
</p>
<p><b>Changes to the Privacy Policy</b>&nbsp;
</p>
<p>From time to time, Gust may update this Privacy Policy in order to reflect changes in its practices. Whenever such changes are made, Gust will post an updated Privacy Policy on its website and may email registered users.&nbsp;. If we make any material changes we will notify you by email (sent to the e-mail address specified in your account) or by means of a notice on this Site prior to the change becoming effective. We encourage you to periodically review this page for the latest information on our privacy practices.</p>
<p>All changes will apply to the personal data that are already collected, and to personal data that are collected after the effective date of the revised Privacy Policy, and will become effective when posted.</p>
<p>You will have the right to terminate your account at any time.</p>
<p><b>Contacting Gust</b>&nbsp;
</p>
<p>Gust, Inc. owns and operates the gust.com web site and the Gust Platform. Our mailing address is 44 West 28th Street, New York, NY 10001 USA.</p>
<p>If you have any questions about this Privacy Policy, or believe that its terms have not been complied with, please email Gust at:&nbsp; support@gust.com&nbsp;</p>
<p>
<br>
</p>
<p>Effective Date: October 20, 2016</p>
<p>
<br>
</p>
<div class="security clearfix">
<div>
<a href="https://privacy.truste.com/privacy-seal/validation?rid=3ca9e17f-4a0f-4390-bec5-0d919b2d210b&amp;lang=en" target="_blank" title="TRUSTe Privacy Certification">
<img alt="TRUSTe Privacy Certification" src="https://privacy-policy.truste.com/privacy-seal/seal?rid=3ca9e17f-4a0f-4390-bec5-0d919b2d210b" style="border: none">
</a>
</div>
</div>


</div>
  
  </section>
  
  
  <footer>
  
   
  
    <div class="copyright">
      © 2016 Gust. All rights reserved  |  <a target="_blank" href="<?php echo BASE_PATH; ?>/terms">Terms of Service</a>  |  <a target="_blank" href="<?php echo BASE_PATH; ?>/privacy">Privacy</a>
    </div>
  
  </footer>
  <footer class="email">
  
    <span class="title">Not ready to get started?</span>
    <span class="instructions">We can still help you move your startup forward. Subscribe to hear from experienced founders and investors on building a scalable and investable business, delivered weekly to your inbox.</span>
  
    <input type="email">
    <button>Subscribe</button>
    
  </footer>

<script type="text/javascript" src="../js/launch.js"></script></body>
</html>
