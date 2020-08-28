<?php
function getPreferredLanguage() {
	$langs = array();
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		// break up string into pieces (languages and q factors)
		preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i',
				$_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
		if (count($lang_parse[1])) {
			// create a list like "en" => 0.8
			$langs = array_combine($lang_parse[1], $lang_parse[4]);
			// set default to 1 for any without q factor
			foreach ($langs as $lang => $val) {
				if ($val === '') $langs[$lang] = 1;
			}
			// sort list based on value
			arsort($langs, SORT_NUMERIC);
		}
	}
	//extract most important (first)
	foreach ($langs as $lang => $val) { break; }
	//if complex language simplify it
	if (stristr($lang,"-")) {$tmp = explode("-",$lang); $lang = $tmp[0]; }
	return $lang;
}

$output = '{
	"source": "http://www.metamodpro.com/browser-language-codes",
	"languageCodes": [{
			"code": "af",
			"language": "Afrikaans",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sq",
			"language": "Albanian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "am",
			"language": "Amharic",
			"home": "/content/ET/amh/library.html"
		},
		{
			"code": "ar",
			"language": "Arabic (Standard)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-dz",
			"language": "Arabic (Algeria)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-bh",
			"language": "Arabic (Bahrain)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-eg",
			"language": "Arabic (Egypt)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-iq",
			"language": "Arabic (Iraq)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-jo",
			"language": "Arabic (Jordan)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-kw",
			"language": "Arabic (Kuwait)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-lb",
			"language": "Arabic (Lebanon)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-ly",
			"language": "Arabic (Libya)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-ma",
			"language": "Arabic (Morocco)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-om",
			"language": "Arabic (Oman)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-qa",
			"language": "Arabic (Qatar)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-sa",
			"language": "Arabic (Saudi Arabia)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-sy",
			"language": "Arabic (Syria)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-tn",
			"language": "Arabic (Tunisia)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-ae",
			"language": "Arabic (U.A.E.)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "ar-ye",
			"language": "Arabic (Yemen)",
			"home": "/content/EG/arb/library.html"
		},
		{
			"code": "an",
			"language": "Aragonese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "hy",
			"language": "Armenian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "as",
			"language": "Assamese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ast",
			"language": "Asturian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "az",
			"language": "Azerbaijani",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "eu",
			"language": "Basque",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "be",
			"language": "Belarusian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "bn",
			"language": "Bengali",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "bs",
			"language": "Bosnian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "br",
			"language": "Breton",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "bg",
			"language": "Bulgarian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "my",
			"language": "Burmese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ca",
			"language": "Catalan",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ch",
			"language": "Chamorro",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ce",
			"language": "Chechen",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "zh",
			"language": "Chinese",
			"home": "/content/CN/zhs/library.html"
		},
		{
			"code": "zh-hk",
			"language": "Chinese (Hong Kong)",
			"home": "/content/CN/zhs/library.html"
		},
		{
			"code": "zh-cn",
			"language": "Chinese (PRC)",
			"home": "/content/CN/zhs/library.html"
		},
		{
			"code": "zh-sg",
			"language": "Chinese (Singapore)",
			"home": "/content/CN/zhs/library.html"
		},
		{
			"code": "zh-tw",
			"language": "Chinese (Taiwan)",
			"home": "/content/CN/zhs/library.html"
		},
		{
			"code": "cv",
			"language": "Chuvash",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "co",
			"language": "Corsican",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "cr",
			"language": "Cree",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "hr",
			"language": "Croatian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "cs",
			"language": "Czech",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "da",
			"language": "Danish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "nl",
			"language": "Dutch (Standard)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "nl-be",
			"language": "Dutch (Belgian)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en",
			"language": "English",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-au",
			"language": "English (Australia)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-bz",
			"language": "English (Belize)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-ca",
			"language": "English (Canada)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-ie",
			"language": "English (Ireland)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-jm",
			"language": "English (Jamaica)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-nz",
			"language": "English (New Zealand)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-ph",
			"language": "English (Philippines)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-za",
			"language": "English (South Africa)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-tt",
			"language": "English (Trinidad & Tobago)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-gb",
			"language": "English (United Kingdom)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "en-us",
			"language": "English (United States)",
			"home": "/content/US/eng/library.html"
		},
		{
			"code": "en-zw",
			"language": "English (Zimbabwe)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "eo",
			"language": "Esperanto",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "et",
			"language": "Estonian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fo",
			"language": "Faeroese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fa",
			"language": "Farsi",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fj",
			"language": "Fijian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fi",
			"language": "Finnish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fr",
			"language": "French (Standard)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fr-be",
			"language": "French (Belgium)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fr-ca",
			"language": "French (Canada)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fr-fr",
			"language": "French (France)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fr-lu",
			"language": "French (Luxembourg)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fr-mc",
			"language": "French (Monaco)",
			"home": "/content/fra/library.html"
		},
		{
			"code": "fr-ch",
			"language": "French (Switzerland)",
			"home": "/content/FR/fra/library.html"
		},
		{
			"code": "fy",
			"language": "Frisian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "fur",
			"language": "Friulian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "gd",
			"language": "Gaelic (Scots)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "gd-ie",
			"language": "Gaelic (Irish)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "gl",
			"language": "Galacian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ka",
			"language": "Georgian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "de",
			"language": "German (Standard)",
			"home": "/content/DE/deu/library.html"
		},
		{
			"code": "de-at",
			"language": "German (Austria)",
			"home": "/content/DE/deu/library.html"
		},
		{
			"code": "de-de",
			"language": "German (Germany)",
			"home": "/content/DE/deu/library.html"
		},
		{
			"code": "de-li",
			"language": "German (Liechtenstein)",
			"home": "/content/DE/deu/library.html"
		},
		{
			"code": "de-lu",
			"language": "German (Luxembourg)",
			"home": "/content/DE/deu/library.html"
		},
		{
			"code": "de-ch",
			"language": "German (Switzerland)",
			"home": "/content/CH/deu/library.html"
		},
		{
			"code": "el",
			"language": "Greek",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "gu",
			"language": "Gujurati",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ht",
			"language": "Haitian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "he",
			"language": "Hebrew",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "hi",
			"language": "Hindi",
			"home": "/content/IN/hin/library.html"
		},
		{
			"code": "hu",
			"language": "Hungarian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "is",
			"language": "Icelandic",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "id",
			"language": "Indonesian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "iu",
			"language": "Inuktitut",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ga",
			"language": "Irish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "it",
			"language": "Italian (Standard)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "it-ch",
			"language": "Italian (Switzerland)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ja",
			"language": "Japanese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "kn",
			"language": "Kannada",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ks",
			"language": "Kashmiri",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "kk",
			"language": "Kazakh",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "km",
			"language": "Khmer",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ky",
			"language": "Kirghiz",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ko",
			"language": "Korean",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ko-kp",
			"language": "Korean (North Korea)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ko-kr",
			"language": "Korean (South Korea)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "la",
			"language": "Latin",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "lv",
			"language": "Latvian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "lt",
			"language": "Lithuanian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "lb",
			"language": "Luxembourgish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "mk",
			"language": "FYRO Macedonian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ms",
			"language": "Malay",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ml",
			"language": "Malayalam",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "mt",
			"language": "Maltese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "mi",
			"language": "Maori",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "mr",
			"language": "Marathi",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "mo",
			"language": "Moldavian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "nv",
			"language": "Navajo",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ng",
			"language": "Ndonga",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ne",
			"language": "Nepali",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "no",
			"language": "Norwegian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "nb",
			"language": "Norwegian (Bokmal)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "nn",
			"language": "Norwegian (Nynorsk)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "oc",
			"language": "Occitan",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "or",
			"language": "Oriya",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "om",
			"language": "Oromo",
			"home": "/content/ET/gaz/library.html"
		},
		{
			"code": "fa-ir",
			"language": "Persian/Iran",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "pl",
			"language": "Polish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "pt",
			"language": "Portuguese",
			"home": "/content/BR/por/library.html"
		},
		{
			"code": "pt-br",
			"language": "Portuguese (Brazil)",
			"home": "/content/BR/por/library.html"
		},
		{
			"code": "pa",
			"language": "Punjabi",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "pa-in",
			"language": "Punjabi (India)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "pa-pk",
			"language": "Punjabi (Pakistan)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "qu",
			"language": "Quechua",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "rm",
			"language": "Rhaeto-Romanic",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ro",
			"language": "Romanian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ro-mo",
			"language": "Romanian (Moldavia)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ru",
			"language": "Russian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ru-mo",
			"language": "Russian (Moldavia)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sz",
			"language": "Sami (Lappish)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sg",
			"language": "Sango",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sa",
			"language": "Sanskrit",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sc",
			"language": "Sardinian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sd",
			"language": "Sindhi",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "si",
			"language": "Singhalese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sr",
			"language": "Serbian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sk",
			"language": "Slovak",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sl",
			"language": "Slovenian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "so",
			"language": "Somani",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sb",
			"language": "Sorbian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "es",
			"language": "Spanish",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-ar",
			"language": "Spanish (Argentina)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-bo",
			"language": "Spanish (Bolivia)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-cl",
			"language": "Spanish (Chile)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-co",
			"language": "Spanish (Colombia)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-cr",
			"language": "Spanish (Costa Rica)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-do",
			"language": "Spanish (Dominican Republic)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-ec",
			"language": "Spanish (Ecuador)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-sv",
			"language": "Spanish (El Salvador)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-gt",
			"language": "Spanish (Guatemala)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-hn",
			"language": "Spanish (Honduras)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-mx",
			"language": "Spanish (Mexico)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-ni",
			"language": "Spanish (Nicaragua)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-pa",
			"language": "Spanish (Panama)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-py",
			"language": "Spanish (Paraguay)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-pe",
			"language": "Spanish (Peru)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-pr",
			"language": "Spanish (Puerto Rico)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-es",
			"language": "Spanish (Spain)",
			"home": "/content/spa/library.html"
		},
		{
			"code": "es-uy",
			"language": "Spanish (Uruguay)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "es-ve",
			"language": "Spanish (Venezuela)",
			"home": "/content/ES/spa/library.html"
		},
		{
			"code": "sx",
			"language": "Sutu",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sw",
			"language": "Swahili",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sv",
			"language": "Swedish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sv-fi",
			"language": "Swedish (Finland)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "sv-sv",
			"language": "Swedish (Sweden)",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ta",
			"language": "Tamil",
			"home": "/content/LK/tam/library.html"
		},
		{
			"code": "tt",
			"language": "Tatar",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "te",
			"language": "Teluga",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "th",
			"language": "Thai",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "tig",
			"language": "Tigre",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ts",
			"language": "Tsonga",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "tn",
			"language": "Tswana",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "tr",
			"language": "Turkish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "tk",
			"language": "Turkmen",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "uk",
			"language": "Ukrainian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "hsb",
			"language": "Upper Sorbian",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ur",
			"language": "Urdu",
			"home": "/content/PK/urd/library.html"
		},
		{
			"code": "ve",
			"language": "Venda",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "vi",
			"language": "Vietnamese",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "vo",
			"language": "Volapuk",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "wa",
			"language": "Walloon",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "cy",
			"language": "Welsh",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "xh",
			"language": "Xhosa",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "ji",
			"language": "Yiddish",
			"home": "/content/AU/eng/index.html"
		},
		{
			"code": "zu",
			"language": "Zulu",
			"home": "/content/AU/eng/index.html"
		}
	],  
';  // yes, I know that this is a broken fragment, but we will finish it off below
 
//This returns the most preferred langauage "q=1"

$pref =  getPreferredLanguage();
$output .= '"preference": "'. $pref . '"
}';
//$fh = fopen('logs/browserlanguage.txt', 'w');
//fwrite($fh, $output);
//fclose($fh);
echo $output;
