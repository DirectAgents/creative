<form name="commercialloanapplication" action="" method="post" onsubmit="return commercial_loan_check()">
    <table width="100%" border="0" cellpadding="0" cellspacing="16" style="width:100% !important;">
        <tr>
            <td colspan="2">
                <span class="rqd">*</span> Indicates Required Fields
            </td>
        </tr>
        <tr>
            <td style="background-color:#4A7AB3;color:#ffffff;  font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2">Loan / Property Information</td>
        </tr>
        <tr>
            <td width="30%">Type of Loan:</td>
            <td width="70%"><span class="wpcf7-form-control-wrap menu-1"><select  name="menu-1"><option value="---">---</option><option value="Acquisition of property">Acquisition of property</option><option value="Development">Development</option><option value="Refinance">Refinance</option><option value="Business Expansion">Business Expansion</option><option value="Raw land purchase">Raw land purchase</option></select></span></td>
        </tr>
        <tr>
            <td>Requested Fixed Rate Term:</td>
            <td><span ><select  name="menu-2"><option value="---">---</option><option value="1 Year Fixed">1 Year Fixed</option><option value="3 Year Fixed">3 Year Fixed</option><option value="5 Year Fixed">5 Year Fixed</option><option value="7 Year Fixed">7 Year Fixed</option><option value="10 Year Fixed">10 Year Fixed</option><option value="10-20 Year Fixed">10-20 Year Fixed</option><option value="20-30 Year Fixed">20-30 Year Fixed</option></select></span></td>
        </tr>
        <tr>
            <td>Requested Amortization:</td>
            <td><span ><select  name="menu-3"><option value="---">---</option><option value="5 Year">5 Year</option><option value="10 Year">10 Year</option><option value="15 Year">15 Year</option><option value="20 Year">20 Year</option><option value="25 Year">25 Year</option><option value="30 Year">30 Year</option></select></span></td>
        </tr>
        <tr>
            <td>When do you need the loan?: <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap menu-4"><select  name="menu-4"><option value="---">---</option><option value="Right Now">Right Now</option><option value="1-2 weeks">1-2 weeks</option><option value="Within 4 weeks">Within 4 weeks</option><option value="Within 6 weeks">Within 6 weeks</option><option value="Within 2 months">Within 2 months</option><option value="Within 3 months">Within 3 months</option><option value="Within 4 months">Within 4 months</option><option value="Within 5 months">Within 5 months</option><option value="Within 6 months">Within 6 months</option><option value="More than 6 months">More than 6 months</option></select></span></td>
        </tr>
        <tr>
            <td>Desired Loan Amount: ($) <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-1"><input type="text" maxlength="40" size="30"  class="input" value="" name="text-1"></span></td>
        </tr>
        <tr>
            <td>What type of property?</td>
            <td><span class="wpcf7-form-control-wrap menu-5"><select  name="menu-5"><option value="---">---</option><option value="Auto Services">Auto Services</option><option value="Office Space">Office Space</option><option value="Hotel/Motel">Hotel/Motel</option><option value="Industrial">Industrial</option><option value="Mixed use">Mixed use</option><option value="Office">Office</option><option value="Retail">Retail</option><option value="Multifamily">Multifamily</option><option value="Other">Other</option></select></span></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><span class="wpcf7-form-control-wrap text-2"><input type="text" maxlength="40" size="30" class="input" value="" name="text-2"></span></td>
        </tr>
        <tr>
            <td>City</td>
            <td><span class="wpcf7-form-control-wrap text-3"><input type="text" maxlength="20" size="10" class="input" value="" name="text-3"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-6"><select  name="menu-6"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-4"><input type="text" maxlength="5" size="5" class="input" value="" name="text-4"></span></td>
        </tr>
        <tr>
            <td style="background-color:#4A7AB3;color:#ffffff;  font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2">Contact Information</td>
        </tr>
        <tr>
            <td>First Name <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-5"><input type="text" maxlength="40" size="30" class="input" value="" name="text-5"></span></td>
        </tr>
        <tr>
            <td>Last Name <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-6"><input type="text" maxlength="40" size="30" class="input" value="" name="text-6"></span></td>
        </tr>
        <tr>
            <td>Street Address</td>
            <td><span class="wpcf7-form-control-wrap text-7"><input type="text" maxlength="70" size="50" class="input" value="" name="text-7"></span></td>
        </tr>
        <tr>
            <td>City</td>
            <td><span class="wpcf7-form-control-wrap text-8"><input type="text" maxlength="40" size="30" class="input" value="" name="text-8"></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-9"><input type="text" maxlength="5" size="5" class="input" value="" name="text-9"></span></td>
        </tr>
        <tr>
            <td>Email Address <span class="rqd">*</span></td>
            <td><span><input type="text" size="40" class="input" value="" name="email-158"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-7"><select  name="menu-7"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td>Day Phone <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-10"><input type="text" maxlength="10" size="10"  class="input" value="" name="text-10"></span></td>
        </tr>
        <tr>
            <td>Evening Phone</td>
            <td><span class="wpcf7-form-control-wrap text-11"><input type="text" maxlength="11" size="11" class="input" value="" name="text-11"></span></td>
        </tr>
        <tr>
            <td style="background-color:#4A7AB3;color:#ffffff;  font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2">Business Information</td>
        </tr>
        <tr>
            <td>Full Name of Business <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-12"><input type="text" maxlength="100" size="50"  class="input" value="" name="text-12"></span></td>
        </tr>
        <tr>
            <td>Telephone <span class="rqd">*</span></td>
            <td><span class="wpcf7-form-control-wrap text-13"><input type="text" maxlength="10" size="10"  class="input" value="" name="text-13"></span></td>
        </tr>
        <tr>
            <td>Fax</td>
            <td><span class="wpcf7-form-control-wrap text-14"><input type="text" maxlength="10" size="10" class="input" value="" name="text-14"></span></td>
        </tr>
        <tr>
            <td>Street Address</td>
            <td><span class="wpcf7-form-control-wrap text-15"><input type="text" maxlength="40" size="30" class="input" value="" name="text-15"></span></td>
        </tr>
        <tr>
            <td>City</td>
            <td><span class="wpcf7-form-control-wrap text-16"><input type="text" maxlength="40" size="30" class="input" value="" name="text-16"></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-17"><input type="text" maxlength="5" size="5" class="input" value="" name="text-17"></span></td>
        </tr>
        <tr>
            <td>Year Established</td>
            <td><span class="wpcf7-form-control-wrap text-18"><input type="text" maxlength="4" size="4" class="input" value="" name="text-18"></span></td>
        </tr>
        <tr>
            <td>Number of Employees</td>
            <td><span class="wpcf7-form-control-wrap text-19"><input type="text" maxlength="40" size="30" class="input" value="" name="text-19"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-8"><select  name="menu-8"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td>Kind of Business </td>
            <td><span class="wpcf7-form-control-wrap menu-9"><select  name="menu-9"><option value="---">---</option><option value="Retail">Retail</option><option value="Wholesale">Wholesale</option><option value="Manufacturing">Manufacturing</option><option value="Service">Service</option><option value="Other">Other</option></select></span></td>
        </tr>
        <tr>
            <td style="background-color:#4A7AB3;color:#ffffff;  font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2">Owners</td>
        </tr>
        <tr>
            <td>Owner/Partner/Corp</td>
            <td><span class="wpcf7-form-control-wrap text-37"><input type="text" maxlength="40" size="30" class="input" value="" name="text-37"></span></td>
        </tr>
        <tr>
            <td>Title </td>
            <td><span class="wpcf7-form-control-wrap text-38"><input type="text" maxlength="40" size="30" class="input" value="" name="text-38"></span></td>
        </tr>
        <tr>
            <td>% of Shares Owned</td>
            <td><span class="wpcf7-form-control-wrap text-39"><input type="text" maxlength="10" size="10" class="input" value="" name="text-39"></span></td>
        </tr>
        <tr>
            <td>% of Partnership</td>
            <td><span class="wpcf7-form-control-wrap text-40"><input type="text" maxlength="10" size="10" class="input" value="" name="text-40"></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Owner/Partner/Corp</td>
            <td><span class="wpcf7-form-control-wrap text-41"><input type="text" maxlength="40" size="30" class="input" value="" name="text-41"></span></td>
        </tr>
        <tr>
            <td>Title </td>
            <td><span class="wpcf7-form-control-wrap text-42"><input type="text" maxlength="40" size="30" class="input" value="" name="text-42"></span></td>
        </tr>
        <tr>
            <td>% of Shares Owned</td>
            <td><span class="wpcf7-form-control-wrap text-43"><input type="text" maxlength="10" size="10" class="input" value="" name="text-43"></span></td>
        </tr>
        <tr>
            <td>% of Partnership</td>
            <td><span class="wpcf7-form-control-wrap text-44"><input type="text" maxlength="10" size="10" class="input" value="" name="text-44"></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Owner/Partner/Corp</td>
            <td><span class="wpcf7-form-control-wrap text-45"><input type="text" maxlength="40" size="30" class="input" value="" name="text-45"></span></td>
        </tr>
        <tr>
            <td>Title </td>
            <td><span class="wpcf7-form-control-wrap text-46"><input type="text" maxlength="40" size="30" class="input" value="" name="text-46"></span></td>
        </tr>
        <tr>
            <td>% of Shares Owned</td>
            <td><span class="wpcf7-form-control-wrap text-47"><input type="text" maxlength="10" size="10" class="input" value="" name="text-47"></span></td>
        </tr>
        <tr>
            <td>% of Partnership</td>
            <td><span class="wpcf7-form-control-wrap text-48"><input type="text" maxlength="10" size="10" class="input" value="" name="text-48"></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="background-color:#4A7AB3;color:#ffffff;  font-weight: bold;padding-left:10px;padding-top:2px; margin-bottom:7px; padding-bottom:2px;" colspan="2">Trade / Credit References</td>
        </tr>
        <tr>
            <td>Name</td>
            <td><span class="wpcf7-form-control-wrap text-20"><input type="text" maxlength="40" size="30" class="input" value="" name="text-20"></span></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><span class="wpcf7-form-control-wrap text-21"><input type="text" maxlength="40" size="30" class="input" value="" name="text-21"></span></td>
        </tr>
        <tr>
            <td>City </td>
            <td><span class="wpcf7-form-control-wrap text-22"><input type="text" maxlength="40" size="30" class="input" value="" name="text-22"></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-23"><input type="text" maxlength="5" size="5" class="input" value="" name="text-23"></span></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><span class="wpcf7-form-control-wrap text-24"><input type="text" maxlength="10" size="10" class="input" value="" name="text-24"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-10"><select  name="menu-10"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Name</td>
            <td><span class="wpcf7-form-control-wrap text-25"><input type="text" maxlength="40" size="30" class="input" value="" name="text-25"></span></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><span class="wpcf7-form-control-wrap text-26"><input type="text" maxlength="40" size="30" class="input" value="" name="text-26"></span></td>
        </tr>
        <tr>
            <td>City </td>
            <td><span class="wpcf7-form-control-wrap text-27"><input type="text" maxlength="40" size="30" class="input" value="" name="text-27"></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-28"><input type="text" maxlength="5" size="5" class="input" value="" name="text-28"></span></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><span class="wpcf7-form-control-wrap text-29"><input type="text" maxlength="10" size="10" class="input" value="" name="text-29"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-11"><select  name="menu-11"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Name</td>
            <td><span class="wpcf7-form-control-wrap text-30"><input type="text" maxlength="40" size="30" class="input" value="" name="text-30"></span></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><span class="wpcf7-form-control-wrap text-31"><input type="text" maxlength="40" size="30" class="input" value="" name="text-31"></span></td>
        </tr>
        <tr>
            <td>City </td>
            <td><span class="wpcf7-form-control-wrap text-32"><input type="text" maxlength="40" size="30" class="input" value="" name="text-32"></span></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><span class="wpcf7-form-control-wrap text-34"><input type="text" maxlength="5" size="5" class="input" value="" name="text-34"></span></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><span class="wpcf7-form-control-wrap text-35"><input type="text" maxlength="10" size="10" class="input" value="" name="text-35"></span></td>
        </tr>
        <tr>
            <td>State</td>
            <td><span class="wpcf7-form-control-wrap menu-12"><select  name="menu-12"><option value="---">---</option><option value="Alaska">Alaska</option><option value="Alabama">Alabama</option><option value="Arkansas">Arkansas</option><option value="Arizona">Arizona</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="District of Columbia">District of Columbia</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Massachusetts">Massachusetts</option><option value="Maryland">Maryland</option><option value="Maine">Maine</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Missouri">Missouri</option><option value="Mississippi">Mississippi</option><option value="Montana">Montana</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Nebraska">Nebraska</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="Nevada">Nevada</option><option value="New York">New York</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Virginia">Virginia</option><option value="Vermont">Vermont</option><option value="Washington">Washington</option><option value="Wisconsin">Wisconsin</option><option value="West Virginia">West Virginia</option><option value="Wyoming">Wyoming</option></select></span></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Please describe the purpose of your loan:</td>
            <td ><span><textarea rows="4" cols="60" name="textarea-168" class="input" ></textarea></span></td>
        </tr>
        <tr>
            <td>How did you hear about us?</td>
            <td><span class="wpcf7-form-control-wrap text-36"><input type="text" maxlength="10" size="10" class="input" value="" name="text-36"></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
               <input type="submit" value="Submit Commercial Loan Application" class="submit" name="submit"/>
            </td>
        </tr>
    </table>
</form>