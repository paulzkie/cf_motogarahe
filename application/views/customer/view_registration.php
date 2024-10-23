
    <img class="center-image" src="<?php echo SITE_IMG_PATH?>special/bg-1.jpg" alt="">
    <div class="container">
        <div class="login-fullpage">
            <div class="row">
                <div class="login-logo"><img class="center-image" src="<?php echo SITE_IMG_PATH?>special/login.jpg" alt=""></div>
                <div class="col-xs-12 col-sm-7">
                    <div class="f-login-content">
                        <div class="f-login-header">
                            <div class="f-login-title color-dr-blue-2">Welcome back!</div>
                            <div class="f-login-desc color-grey">Register an account</div>
                        </div>
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <form class="f-login-form" action="" method="POST">
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_username" placeholder="Enter your username" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="password" name="cus_password" placeholder="Enter your password" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_fname" placeholder="Enter your firstname" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_mname" placeholder="Enter your middlename" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_lname" placeholder="Enter your lastname" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_address" placeholder="Enter your address" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_city" placeholder="Enter your city" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_state" placeholder="Enter your state" required>
                            </div>
                            <div class="drop-wrap drop-wrap-s-4 input-style-1 b-50 type-2 color-5">
                                <div class="drop">
                                    <b>Country</b>
                                    <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                    <span name="age_country">
                                        <a href="Afghanistan">Afghanistan</a>
                                        <a href="Albania">Albania</a>
                                        <a href="Algeria">Algeria</a>
                                        <a href="American Samoa">American Samoa</a>
                                        <a href="Andorra">Andorra</a>
                                        <a href="Angola">Angola</a>
                                        <a href="Anguilla">Anguilla</a>
                                        <a href="Antartica">Antarctica</a>
                                        <a href="Antigua and Barbuda">Antigua and Barbuda</a>
                                        <a href="Argentina">Argentina</a>
                                        <a href="Armenia">Armenia</a>
                                        <a href="Aruba">Aruba</a>
                                        <a href="Australia">Australia</a>
                                        <a href="Austria">Austria</a>
                                        <a href="Azerbaijan">Azerbaijan</a>
                                        <a href="Bahamas">Bahamas</a>
                                        <a href="Bahrain">Bahrain</a>
                                        <a href="Bangladesh">Bangladesh</a>
                                        <a href="Barbados">Barbados</a>
                                        <a href="Belarus">Belarus</a>
                                        <a href="Belgium">Belgium</a>
                                        <a href="Belize">Belize</a>
                                        <a href="Benin">Benin</a>
                                        <a href="Bermuda">Bermuda</a>
                                        <a href="Bhutan">Bhutan</a>
                                        <a href="Bolivia">Bolivia</a>
                                        <a href="Bosnia and Herzegowina">Bosnia and Herzegowina</a>
                                        <a href="Botswana">Botswana</a>
                                        <a href="Bouvet Island">Bouvet Island</a>
                                        <a href="Brazil">Brazil</a>
                                        <a href="British Indian Ocean Territory">British Indian Ocean Territory</a>
                                        <a href="Brunei Darussalam">Brunei Darussalam</a>
                                        <a href="Bulgaria">Bulgaria</a>
                                        <a href="Burkina Faso">Burkina Faso</a>
                                        <a href="Burundi">Burundi</a>
                                        <a href="Cambodia">Cambodia</a>
                                        <a href="Cameroon">Cameroon</a>
                                        <a href="Canada">Canada</a>
                                        <a href="Cape Verde">Cape Verde</a>
                                        <a href="Cayman Islands">Cayman Islands</a>
                                        <a href="Central African Republic">Central African Republic</a>
                                        <a href="Chad">Chad</a>
                                        <a href="Chile">Chile</a>
                                        <a href="China">China</a>
                                        <a href="Christmas Island">Christmas Island</a>
                                        <a href="Cocos Islands">Cocos (Keeling) Islands</a>
                                        <a href="Colombia">Colombia</a>
                                        <a href="Comoros">Comoros</a>
                                        <a href="Congo">Congo</a>
                                        <a href="Congo">Congo, the Democratic Republic of the</a>
                                        <a href="Cook Islands">Cook Islands</a>
                                        <a href="Costa Rica">Costa Rica</a>
                                        <a href="Cota D'Ivoire">Cote d'Ivoire</a>
                                        <a href="Croatia">Croatia (Hrvatska)</a>
                                        <a href="Cuba">Cuba</a>
                                        <a href="Cyprus">Cyprus</a>
                                        <a href="Czech Republic">Czech Republic</a>
                                        <a href="Denmark">Denmark</a>
                                        <a href="Djibouti">Djibouti</a>
                                        <a href="Dominica">Dominica</a>
                                        <a href="Dominican Republic">Dominican Republic</a>
                                        <a href="East Timor">East Timor</a>
                                        <a href="Ecuador">Ecuador</a>
                                        <a href="Egypt">Egypt</a>
                                        <a href="El Salvador">El Salvador</a>
                                        <a href="Equatorial Guinea">Equatorial Guinea</a>
                                        <a href="Eritrea">Eritrea</a>
                                        <a href="Estonia">Estonia</a>
                                        <a href="Ethiopia">Ethiopia</a>
                                        <a href="Falkland Islands">Falkland Islands (Malvinas)</a>
                                        <a href="Faroe Islands">Faroe Islands</a>
                                        <a href="Fiji">Fiji</a>
                                        <a href="Finland">Finland</a>
                                        <a href="France">France</a>
                                        <a href="France Metropolitan">France, Metropolitan</a>
                                        <a href="French Guiana">French Guiana</a>
                                        <a href="French Polynesia">French Polynesia</a>
                                        <a href="French Southern Territories">French Southern Territories</a>
                                        <a href="Gabon">Gabon</a>
                                        <a href="Gambia">Gambia</a>
                                        <a href="Georgia">Georgia</a>
                                        <a href="Germany">Germany</a>
                                        <a href="Ghana">Ghana</a>
                                        <a href="Gibraltar">Gibraltar</a>
                                        <a href="Greece">Greece</a>
                                        <a href="Greenland">Greenland</a>
                                        <a href="Grenada">Grenada</a>
                                        <a href="Guadeloupe">Guadeloupe</a>
                                        <a href="Guam">Guam</a>
                                        <a href="Guatemala">Guatemala</a>
                                        <a href="Guinea">Guinea</a>
                                        <a href="Guinea-Bissau">Guinea-Bissau</a>
                                        <a href="Guyana">Guyana</a>
                                        <a href="Haiti">Haiti</a>
                                        <a href="Heard and McDonald Islands">Heard and Mc Donald Islands</a>
                                        <a href="Holy See">Holy See (Vatican City State)</a>
                                        <a href="Honduras">Honduras</a>
                                        <a href="Hong Kong">Hong Kong</a>
                                        <a href="Hungary">Hungary</a>
                                        <a href="Iceland">Iceland</a>
                                        <a href="India">India</a>
                                        <a href="Indonesia">Indonesia</a>
                                        <a href="Iran">Iran (Islamic Republic of)</a>
                                        <a href="Iraq">Iraq</a>
                                        <a href="Ireland">Ireland</a>
                                        <a href="Israel">Israel</a>
                                        <a href="Italy">Italy</a>
                                        <a href="Jamaica">Jamaica</a>
                                        <a href="Japan">Japan</a>
                                        <a href="Jordan">Jordan</a>
                                        <a href="Kazakhstan">Kazakhstan</a>
                                        <a href="Kenya">Kenya</a>
                                        <a href="Kiribati">Kiribati</a>
                                        <a href="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</a>
                                        <a href="Korea">Korea, Republic of</a>
                                        <a href="Kuwait">Kuwait</a>
                                        <a href="Kyrgyzstan">Kyrgyzstan</a>
                                        <a href="Lao">Lao People's Democratic Republic</a>
                                        <a href="Latvia">Latvia</a>
                                        <a href="Lebanon" selected>Lebanon</a>
                                        <a href="Lesotho">Lesotho</a>
                                        <a href="Liberia">Liberia</a>
                                        <a href="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</a>
                                        <a href="Liechtenstein">Liechtenstein</a>
                                        <a href="Lithuania">Lithuania</a>
                                        <a href="Luxembourg">Luxembourg</a>
                                        <a href="Macau">Macau</a>
                                        <a href="Macedonia">Macedonia, The Former Yugoslav Republic of</a>
                                        <a href="Madagascar">Madagascar</a>
                                        <a href="Malawi">Malawi</a>
                                        <a href="Malaysia">Malaysia</a>
                                        <a href="Maldives">Maldives</a>
                                        <a href="Mali">Mali</a>
                                        <a href="Malta">Malta</a>
                                        <a href="Marshall Islands">Marshall Islands</a>
                                        <a href="Martinique">Martinique</a>
                                        <a href="Mauritania">Mauritania</a>
                                        <a href="Mauritius">Mauritius</a>
                                        <a href="Mayotte">Mayotte</a>
                                        <a href="Mexico">Mexico</a>
                                        <a href="Micronesia">Micronesia, Federated States of</a>
                                        <a href="Moldova">Moldova, Republic of</a>
                                        <a href="Monaco">Monaco</a>
                                        <a href="Mongolia">Mongolia</a>
                                        <a href="Montserrat">Montserrat</a>
                                        <a href="Morocco">Morocco</a>
                                        <a href="Mozambique">Mozambique</a>
                                        <a href="Myanmar">Myanmar</a>
                                        <a href="Namibia">Namibia</a>
                                        <a href="Nauru">Nauru</a>
                                        <a href="Nepal">Nepal</a>
                                        <a href="Netherlands">Netherlands</a>
                                        <a href="Netherlands Antilles">Netherlands Antilles</a>
                                        <a href="New Caledonia">New Caledonia</a>
                                        <a href="New Zealand">New Zealand</a>
                                        <a href="Nicaragua">Nicaragua</a>
                                        <a href="Niger">Niger</a>
                                        <a href="Nigeria">Nigeria</a>
                                        <a href="Niue">Niue</a>
                                        <a href="Norfolk Island">Norfolk Island</a>
                                        <a href="Northern Mariana Islands">Northern Mariana Islands</a>
                                        <a href="Norway">Norway</a>
                                        <a href="Oman">Oman</a>
                                        <a href="Pakistan">Pakistan</a>
                                        <a href="Palau">Palau</a>
                                        <a href="Panama">Panama</a>
                                        <a href="Papua New Guinea">Papua New Guinea</a>
                                        <a href="Paraguay">Paraguay</a>
                                        <a href="Peru">Peru</a>
                                        <a href="Philippines">Philippines</a>
                                        <a href="Pitcairn">Pitcairn</a>
                                        <a href="Poland">Poland</a>
                                        <a href="Portugal">Portugal</a>
                                        <a href="Puerto Rico">Puerto Rico</a>
                                        <a href="Qatar">Qatar</a>
                                        <a href="Reunion">Reunion</a>
                                        <a href="Romania">Romania</a>
                                        <a href="Russia">Russian Federation</a>
                                        <a href="Rwanda">Rwanda</a>
                                        <a href="Saint Kitts and Nevis">Saint Kitts and Nevis</a> 
                                        <a href="Saint LUCIA">Saint LUCIA</a>
                                        <a href="Saint Vincent">Saint Vincent and the Grenadines</a>
                                        <a href="Samoa">Samoa</a>
                                        <a href="San Marino">San Marino</a>
                                        <a href="Sao Tome and Principe">Sao Tome and Principe</a> 
                                        <a href="Saudi Arabia">Saudi Arabia</a>
                                        <a href="Senegal">Senegal</a>
                                        <a href="Seychelles">Seychelles</a>
                                        <a href="Sierra">Sierra Leone</a>
                                        <a href="Singapore">Singapore</a>
                                        <a href="Slovakia">Slovakia (Slovak Republic)</a>
                                        <a href="Slovenia">Slovenia</a>
                                        <a href="Solomon Islands">Solomon Islands</a>
                                        <a href="Somalia">Somalia</a>
                                        <a href="South Africa">South Africa</a>
                                        <a href="South Georgia">South Georgia and the South Sandwich Islands</a>
                                        <a href="Span">Spain</a>
                                        <a href="SriLanka">Sri Lanka</a>
                                        <a href="St. Helena">St. Helena</a>
                                        <a href="St. Pierre and Miguelon">St. Pierre and Miquelon</a>
                                        <a href="Sudan">Sudan</a>
                                        <a href="Suriname">Suriname</a>
                                        <a href="Svalbard">Svalbard and Jan Mayen Islands</a>
                                        <a href="Swaziland">Swaziland</a>
                                        <a href="Sweden">Sweden</a>
                                        <a href="Switzerland">Switzerland</a>
                                        <a href="Syria">Syrian Arab Republic</a>
                                        <a href="Taiwan">Taiwan, Province of China</a>
                                        <a href="Tajikistan">Tajikistan</a>
                                        <a href="Tanzania">Tanzania, United Republic of</a>
                                        <a href="Thailand">Thailand</a>
                                        <a href="Togo">Togo</a>
                                        <a href="Tokelau">Tokelau</a>
                                        <a href="Tonga">Tonga</a>
                                        <a href="Trinidad and Tobago">Trinidad and Tobago</a>
                                        <a href="Tunisia">Tunisia</a>
                                        <a href="Turkey">Turkey</a>
                                        <a href="Turkmenistan">Turkmenistan</a>
                                        <a href="Turks and Caicos">Turks and Caicos Islands</a>
                                        <a href="Tuvalu">Tuvalu</a>
                                        <a href="Uganda">Uganda</a>
                                        <a href="Ukraine">Ukraine</a>
                                        <a href="United Arab Emirates">United Arab Emirates</a>
                                        <a href="United Kingdom">United Kingdom</a>
                                        <a href="United States">United States</a>
                                        <a href="United States Minor Outlying Islands">United States Minor Outlying Islands</a>
                                        <a href="Uruguay">Uruguay</a>
                                        <a href="Uzbekistan">Uzbekistan</a>
                                        <a href="Vanuatu">Vanuatu</a>
                                        <a href="Venezuela">Venezuela</a>
                                        <a href="Vietnam">Viet Nam</a>
                                        <a href="Virgin Islands (British)">Virgin Islands (British)</a>
                                        <a href="Virgin Islands (U.S)">Virgin Islands (U.S.)</a>
                                        <a href="Wallis and Futana Islands">Wallis and Futuna Islands</a>
                                        <a href="Western Sahara">Western Sahara</a>
                                        <a href="Yemen">Yemen</a>
                                        <a href="Yugoslavia">Yugoslavia</a>
                                        <a href="Zambia">Zambia</a>
                                        <a href="Zimbabwe">Zimbabwe</a>
                                    </span>
                                </div>
                            </div>
                            <div></div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_zip" placeholder="Enter your zip" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_phone" placeholder="Enter your phone" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input type="text" name="cus_email" placeholder="Enter your email" required>
                            </div>
                            <input type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="CONFIRM">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-copy">© 2015 All rights reserved. let’stravel</div>
    </div>
    