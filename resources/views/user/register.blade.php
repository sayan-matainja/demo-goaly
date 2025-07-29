@include('partials.header_portal')
</head>
        <body>
            <div class="alert alert-danger">



            </div>
            <div class="">
            @include('partials.topmenubar_portal')
                <div class="clearfix"></div>
                @include('partials.sidebar_portal_new')
            <div class="page-content mt-10">
                    <div class="main-cat">
                        <div style="background:#4D0053;height: 100px"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="part">
                        <div class="pt-title">Create New Account</div>
                        <img class="unite" src="{{('assets/img/slash.png')}}" alt=""/>

                        <form action="{{route('submit')}}" method="POST">
                            @csrf
                            <div class="col-xs-12 mt-10">
                                <div class="pt-form">
                                    <div class="pt-input">
                                        <label for="pt-user">First Name</label>
                                        <input type="text" placeholder="First Name" name="first_name">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Last Name</label>
                                        <input type="text" placeholder="Last Name" name="last_name">
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Email Address</label>
                                        <input type="email" name="email" placeholder="Email Address">
                                        <p class="">We will send you a confirmation email to this address</p>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Password</label>
                                        <input type="password" name="password" placeholder="Password">
                                        <p>At least 8 characters</p>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Profile Picture</label>
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' name="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('img/acc-default2.png');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Gender</label>
                                        <div class="radio">
                                            <label style="font-size: 1.5em">
                                                <input type="radio" name="gender" value="Male">
                                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                Male
                                            </label>
                                            <label style="font-size: 1.5em">
                                                <input type="radio" name="gender" value="Female">
                                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                Female
                                            </label>
                                            @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                    <div class="liner"></div>
                                    <div class="pt-input">
                                        <label for="pt-user">Mobile Number</label>
                                        <select id="country-code" name="countrycode" class="pt-select">
                                            <option value="">Code</option>
                                            <option value="+1">+1</option>
                                            <option value="+2">+2</option>
                                            <option value="+3">+3</option>
                                            <option value="+10">+10</option>
                                            <option value="+44">+44</option>
                                            <option value="+62">+62</option>
                                            <option value="+65">+65</option>
                                        </select>
                                        <input type="number" placeholder="Mobile Number" name="phone">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="pt-input">
                                        <label for="pt-user">Country Residence</label>
                                        <select id="region" name="region" class="pt-select">
                                            <option value="">Select a country</option>
                                            <option value="241">England</option>
                                            <option value="242">Northern Ireland</option>
                                            <option value="243">Scotland</option>
                                            <option value="244">Wales</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="267">Aland Islands</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                            <option value="7">Anguilla</option>
                                            <option value="8">Antarctica</option>
                                            <option value="9">Antigua and Barbuda</option>
                                            <option value="10">Argentina</option>
                                            <option value="11">Armenia</option>
                                            <option value="12">Aruba</option>
                                            <option value="13">Australia</option>
                                            <option value="14">Austria</option>
                                            <option value="15">Azerbaijan</option>
                                            <option value="16">Bahamas</option>
                                            <option value="17">Bahrain</option>
                                            <option value="18">Bangladesh</option>
                                            <option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="279">Bonaire, Saint Eustatius and Saba</option><option value="27">Bosnia-Herzegovina</option><option value="28">Botswana</option><option value="29">Bouvet Island</option><option value="30">Brazil</option><option value="31">British Indian Ocean Territory</option><option value="32">British Virgin Islands</option><option value="33">Brunei Darussalam</option><option value="34">Bulgaria</option><option value="35">Burkina Faso</option><option value="36">Burundi</option><option value="37">Cambodia</option><option value="38">Cameroon</option><option value="39">Canada</option><option value="40">Cape Verde</option><option value="41">Cayman Islands</option><option value="42">Central African Republic</option><option value="43">Chad</option><option value="44">Chile</option><option value="45">China</option><option value="46">Christmas Island</option><option value="47">Cocos Islands</option><option value="48">Colombia</option><option value="49">Comoros</option><option value="51">Congo</option><option value="50">Congo, Democratic Republic of</option><option value="52">Cook Islands</option><option value="53">Costa Rica</option><option value="97">Croatia</option><option value="55">Cuba</option><option value="281">Curacao</option><option value="56">Cyprus</option><option value="57">Czech Republic</option><option value="58">Denmark</option><option value="59">Djibouti</option><option value="60">Dominica</option><option value="61">Dominican Republic</option><option value="62">Ecuador</option><option value="63">Egypt</option><option value="64">El Salvador</option><option value="65">Equatorial Guinea</option><option value="66">Eritrea</option><option value="67">Estonia</option><option value="68">Ethiopia</option><option value="69">Faeroe Islands</option><option value="70">Falkland Islands</option><option value="71">Fiji</option><option value="72">Finland</option><option value="73">France</option><option value="74">French Guiana</option><option value="75">French Polynesia</option><option value="76">French Southern Territories</option><option value="77">Gabon</option><option value="78">Gambia</option><option value="79">Georgia</option><option value="80">Germany</option><option value="81">Ghana</option><option value="82">Gibraltar</option><option value="83">Greece</option><option value="84">Greenland</option><option value="85">Grenada</option><option value="86">Guadaloupe</option><option value="87">Guam</option><option value="88">Guatemala</option><option value="271">Guernsey</option><option value="89">Guinea</option><option value="90">Guinea-Bissau</option><option value="91">Guyana</option><option value="92">Haiti</option><option value="93">Heard and McDonald Islands</option><option value="94">Holy See</option><option value="95">Honduras</option><option value="96">Hong Kong</option><option value="98">Hungary</option><option value="99">Iceland</option><option value="100">India</option><option value="101">Indonesia</option><option value="102">Iran</option><option value="103">Iraq</option><option value="104">Ireland</option><option value="273">Isle of Man</option><option value="105">Israel</option><option value="106">Italy</option><option value="54">Ivory Coast</option><option value="107">Jamaica</option><option value="108">Japan</option><option value="275">Jersey</option><option value="109">Jordan</option><option value="110">Kazakhstan</option><option value="111">Kenya</option><option value="112">Kiribati</option><option value="115">Kuwait</option><option value="116">Kyrgyzstan</option><option value="117">Laos</option><option value="118">Latvia</option><option value="119">Lebanon</option><option value="120">Lesotho</option><option value="121">Liberia</option><option value="122">Libya</option><option value="123">Liechtenstein</option><option value="124">Lithuania</option><option value="125">Luxembourg</option><option value="126">Macao</option><option value="127">Macedonia</option><option value="128">Madagascar</option><option value="129">Malawi</option><option value="130">Malaysia</option><option value="131">Maldives</option><option value="132">Mali</option><option value="133">Malta</option><option value="134">Marshall Islands</option><option value="135">Martinique</option><option value="136">Mauritania</option><option value="137">Mauritius</option><option value="138">Mayotte</option><option value="139">Mexico</option><option value="140">Micronesia</option><option value="141">Moldova</option><option value="142">Monaco</option><option value="143">Mongolia</option><option value="240">Montenegro</option><option value="144">Montserrat</option><option value="145">Morocco</option><option value="146">Mozambique</option><option value="147">Myanmar</option><option value="148">Namibia</option><option value="149">Nauru</option><option value="150">Nepal</option><option value="152">Netherlands</option><option value="153">New Caledonia</option><option value="154">New Zealand</option><option value="155">Nicaragua</option><option value="156">Niger</option><option value="157">Nigeria</option><option value="158">Niue</option><option value="159">Norfolk Island</option><option value="113">North Korea</option><option value="160">Northern Mariana Islands</option><option value="161">Norway</option><option value="162">Oman</option><option value="163">Pakistan</option><option value="164">Palau</option><option value="165">Palestine</option><option value="166">Panama</option><option value="167">Papua New Guinea</option><option value="168">Paraguay</option><option value="169">Peru</option><option value="170">Philippines</option><option value="171">Pitcairn Island</option><option value="172">Poland</option><option value="173">Portugal</option><option value="174">Puerto Rico</option><option value="175">Qatar</option><option value="176">Reunion</option><option value="177">Romania</option><option value="178">Russia</option><option value="179">Rwanda</option><option value="269">Saint Barthelemy</option><option value="277">Saint Martin</option><option value="185">Samoa</option><option value="186">San Marino</option><option value="187">Sao Tome and Principe</option><option value="188">Saudi Arabia</option><option value="189">Senegal</option><option value="190">Serbia</option><option value="191">Seychelles</option><option value="192">Sierra Leone</option><option value="193">Singapore</option><option value="283">Sint Maarten</option><option value="194">Slovakia</option><option value="195">Slovenia</option><option value="196">Solomon Islands</option><option value="197">Somalia</option><option value="198">South Africa</option><option value="199">South Georgia and the South Sandwich Islands</option><option value="114">South Korea</option><option value="285">South Sudan</option><option value="200">Spain</option><option value="201">Sri Lanka</option><option value="180">St. Helena</option><option value="181">St. Kitts and Nevis</option><option value="182">St. Lucia</option><option value="183">St. Pierre and Miquelon</option><option value="184">St. Vincent and the Grenadines</option><option value="202">Sudan</option><option value="203">Suriname</option><option value="204">Svalbard &amp; Jan Mayen Islands</option><option value="205">Swaziland</option><option value="206">Sweden</option><option value="207">Switzerland</option><option value="208">Syria</option><option value="209">Taiwan</option><option value="210">Tajikistan</option><option value="211">Tanzania</option><option value="212">Thailand</option><option value="213">Timor-Leste</option><option value="214">Togo</option><option value="215">Tokelau</option><option value="216">Tonga</option><option value="217">Trinidad and Tobago</option><option value="218">Tunisia</option><option value="219">Turkey</option><option value="220">Turkmenistan</option><option value="221">Turks and Caicos Islands</option><option value="222">Tuvalu</option><option value="223">US Virgin Islands</option><option value="229">USA</option><option value="224">Uganda</option><option value="225">Ukraine</option><option value="226">United Arab Emirates</option><option value="228">United States Minor Outlying Islands</option><option value="230">Uruguay</option><option value="231">Uzbekistan</option><option value="232">Vanuatu</option><option value="233">Venezuela</option><option value="234">Vietnam</option><option value="235">Wallis and Futuna Islands</option><option value="236">Western Sahara</option><option value="237">Yemen</option><option value="238">Zambia</option><option value="239">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">

                                    <button type="submit" class="btn-reg">&nbsp; Submit</button>

                            </div>
                        </form>

                        <div class="clearfix"></div>
                    </div>

            </div>
            </div>
            @include('partials.footernew')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
            </script>
        </body>
</html>
