<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Add a Movie </title>
<script type="text/javascript">

var numDays = {
                '1': 31, '2': 28, '3': 31, '4': 30, '5': 31, '6': 30,
                '7': 31, '8': 31, '9': 30, '10': 31, '11': 30, '12': 31
              };

function setDays(oMonthSel, oDaysSel, oYearSel)
{
	var nDays, oDaysSelLgth, opt, i = 1;
	nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
	if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
		++nDays;
	oDaysSelLgth = oDaysSel.length;
	if (nDays != oDaysSelLgth)
	{
		if (nDays < oDaysSelLgth)
			oDaysSel.length = nDays;
		else for (i; i < nDays - oDaysSelLgth + 1; i++)
		{
			opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
                  	oDaysSel.options[oDaysSel.length] = opt;
		}
	}
	var oForm = oMonthSel.form;
	var month = oMonthSel.options[oMonthSel.selectedIndex].value;
	var day = oDaysSel.options[oDaysSel.selectedIndex].value;
	var year = oYearSel.options[oYearSel.selectedIndex].value;
	var dateOfreleased = month + '-' + day + '-' + year;
	oForm.hidden.value = dateOfrelease;
}

</script>

    </head>
    <body>



    <p><em>Add a new movie into the database</em></p>

<!-- ADDING AN movie FORM-->
 <form id="addmovie" name="addmovie" method="post" action="">
            <lable for="name"> Name:</lable>
            <input name="name" type="text" id="name" />



<p><lable for="name"> <span> Date of release:</span>
<select name="month" id="month" onchange="setDays(this,day,year)">
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select name="day" id="day" onchange="setDays(month,this,year)">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<select name="year" id="year" onchange="setDays(month,day,this)">
<option value="1944">1944</option>
<option value="1945">1945</option>
<option value="1946">1946</option>
<option value="1947">1947</option>
<option value="1948">1948</option>
<option value="1949">1949</option>
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select>
<input type="text" name="hidden" value="" /></p>


   <p><em>Add information about the new movie</em></p>
   <form id="movielanguage" name="movielanguage" method="post" action="">
              <lable for="language"> Movie Language:</lable>
  <select>
    <option>English</option>
    <option>Spanish</option>
    <option>French</option>
    <option>German</option>
    <option>Italian</option>
    <option>Chinese</option>
    <option>Tagalog</option>
    <option>Polish</option>
    <option>Korean</option>
    <option>Vietnamese</option>
    <option>Portuguese</option>
    <option>Japanese</option>
    <option>Greek</option>
    <option>Arabic</option>
    <option>Hindi (urdu)</option>
    <option>Russian</option>
    <option>Yiddish</option>
    <option>Thai (laotian)</option>
    <option>Persian</option>
    <option>French Creole</option>
    <option>Armenian</option>
    <option>Navaho</option>
    <option>Hungarian</option>
    <option>Hebrew</option>
    <option>Dutch</option>
    <option>Mon-khmer (cambodian)</option>
    <option>Gujarathi</option>
    <option>Ukrainian</option>
    <option>Czech</option>
    <option>Pennsylvania Dutch</option>
    <option>Miao (hmong)</option>
    <option>Norwegian</option>
    <option>Slovak</option>
    <option>Swedish</option>
    <option>Serbocroatian</option>
    <option>Kru</option>
    <option>Rumanian</option>
    <option>Lithuanian</option>
    <option>Finnish</option>
    <option>Panjabi</option>
    <option>Formosan</option>
    <option>Croatian</option>
    <option>Turkish</option>
    <option>Ilocano</option>
    <option>Bengali</option>
    <option>Danish</option>
    <option>Syriac</option>
    <option>Samoan</option>
    <option>Malayalam</option>
    <option>Cajun</option>
    <option>Amharic</option>
</select>

<br>
<br>

<form id="moviesubtitles" name="moviesubtitles" method="post" action="">
           <lable for="subtitles"> Movie Subtitles:</lable>
<select>
 <option>English</option>
 <option>Spanish</option>
 <option>French</option>
 <option>German</option>
 <option>Italian</option>
 <option>Chinese</option>
 <option>Tagalog</option>
 <option>Polish</option>
 <option>Korean</option>
 <option>Vietnamese</option>
 <option>Portuguese</option>
 <option>Japanese</option>
 <option>Greek</option>
 <option>Arabic</option>
 <option>Hindi (urdu)</option>
 <option>Russian</option>
 <option>Yiddish</option>
 <option>Thai (laotian)</option>
 <option>Persian</option>
 <option>French Creole</option>
 <option>Armenian</option>
 <option>Navaho</option>
 <option>Hungarian</option>
 <option>Hebrew</option>
 <option>Dutch</option>
 <option>Mon-khmer (cambodian)</option>
 <option>Gujarathi</option>
 <option>Ukrainian</option>
 <option>Czech</option>
 <option>Pennsylvania Dutch</option>
 <option>Miao (hmong)</option>
 <option>Norwegian</option>
 <option>Slovak</option>
 <option>Swedish</option>
 <option>Serbocroatian</option>
 <option>Kru</option>
 <option>Rumanian</option>
 <option>Lithuanian</option>
 <option>Finnish</option>
 <option>Panjabi</option>
 <option>Formosan</option>
 <option>Croatian</option>
 <option>Turkish</option>
 <option>Ilocano</option>
 <option>Bengali</option>
 <option>Danish</option>
 <option>Syriac</option>
 <option>Samoan</option>
 <option>Malayalam</option>
 <option>Cajun</option>
 <option>Amharic</option>
</select>
<br>
<p> <lable for="country"> Country:</lable>
            <select name="country">

<option value="United States of America">United States of America</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
<p> <input type="submit" name="bfetch" value="Add"/>
</form>


 </script>


   <?php


		if (array_key_exists('ipass', $_POST) && array_key_exists('iuser', $_POST) && array_key_exists('name', $_POST))
		{

			$d_fname = $_POST['name'];
			$d_dob = $_POST['dateOfrelease'];

			// Connecting, selecting database
			$dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=".$_POST['iuser']." user=".$_POST['iuser']." password=".$_POST['ipass'])
			or die('Could not connect: ' . pg_last_error());

			// Performing SQL query
			// $query = 'SELECT * FROM project.movie';
			$query = "INSERT INTO project.movie (name,date_of_release) VALUES ('$d_name','$d_dob')";
			$result = pg_query($dbconn);

			if(!$result) { die('Insertion failed: ' . pg_last_error());}
			echo "A new movie has been added into the database! ";

			// Free resultset
			pg_free_result($result);

			// Closing connection
			pg_close($dbconn);
		}
		?>

    </body>
</html>
