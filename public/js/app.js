var CACHE_DYNAMIC_NAME = "myfriends-run-time-v3";

if ("serviceWorker" in navigator) {
  navigator.serviceWorker
    .register("/sw.js")
    .then(function() {
      console.log("Service worker registered!");
      localStorage.setItem("swWorking", "TRUE");
    })
    .catch(function(err) {
      console.log(err);
      localStorage.setItem("swWorking", "FALSE");
    });
}

// return to last page if restarting
// check for current dynamic

async function router() {
  // check if dynamic cache needs updating
  if (CACHE_DYNAMIC_NAME != localStorage.getItem("dynamic-cache")) {
    console.log("I have a different local cache");
    restoreDynamic();
    caches.delete(localStorage.getItem("dynamic-cache"));
    localStorage.setItem("dynamic-cache", CACHE_DYNAMIC_NAME);
  }
  var home = "/";
  // which page should we go to?
  var currentPage = window.location.pathname;
  // go to last page visited if you are visiting root page again
  if (localStorage.getItem("last_page") && currentPage == home) {
    var last_page = localStorage.getItem("last_page");
    localStorage.removeItem("last_page");
    window.location.replace(last_page);
  } else {
    // stay here if you entered into any other page than the root,
    if (currentPage !== home) {
      console.log("going to last page");
      localStorage.setItem("last_page", window.location.href);
    }
    // otherwise guess the best page for this browser,
    // first check to see if you know whih languge they are in
    else {
		if ('bob' != 'genious'){
			home = '/content/M2/eng/multiply/index.html';
			window.location.replace(home);
			return;
		}
        $.getJSON("https://json.geoiplookup.io", function(data) {
        var ajaxPromise = fetch("/countries.json")
          .then(function(response) {
            return response.json();
          })
          .then(function(jsonFile) {
            let index = "ZZ";
            jsonFile.forEach(function(element) {
              if (element.code === data.country_code) {
                index = element.home;
              }
            });
            return index;
          })
          .then(function(index) {
            if (index != "ZZ") {
              console.log(index);
              window.location.replace(index);
            }
            // we don't know their country, so can we tell the language?
            else {
              var ajaxPromise = fetch("/browserlanguage.php")
                .then(function(response) {
                  console.log("this is response from browserLanguage");
                  console.log(response.json);
                  return response.json();
                })
                .then(function(jsonFile) {
                  console.log("this is jsonFile");
                  console.log(jsonFile);
                  var pref = jsonFile.preference;
                  var codes = jsonFile.languageCodes;
                  codes.forEach(function(row) {
                    if (row.code == pref) {
                      var home = row.home;
                      window.location.replace(home);
                    }
                  });
                })
                .catch(function(err) {
                  console.log("Do not know browser language");
                  console.log(err);
                  window.location.replace("content/languages.html");
                });
            }
          });
      });
    }
  }
}

document.addEventListener("DOMContentLoaded", router);

function restoreDynamic() {
  if (typeof localStorage.offline != "undefined" && localStorage.offline) {
    console.log("restoreDynamic");
    offline = JSON.parse(localStorage.offline); //get existing values
    offline.forEach(function(series) {
      var ajaxPromise = fetch(series)
        .then(function(response) {
          return response.json();
        })
        .then(function(jsonFile) {
          jsonFile.forEach(function(element) {
            console.log(element.url);
            caches.open(CACHE_DYNAMIC_NAME).then(function(cache) {
              cache.add(element.url);
            });
          });
        });
    });
  }
}
// check to see if this is an index file for a series and get value index.json
window.onload = function() {
  var series = document.getElementById("offline-request");
  if (series !== null) {
    checkOfflineSeries(series.dataset.json);
  }
   var notes = document.getElementById("notes_page").value;
   if (notes !== null){
	   showNotes(notes);
   }
};

function checkOfflineSeries(series) {
  console.log(series + "  is being checked");
  // set ios prompt if needed
  //https://www.netguru.co/codestories/few-tips-that-will-make-your-pwa-on-ios-feel-like-native
  if (this.needsToSeePrompt()) {
    localStorage.setItem("lastSeenPrompt", new Date()); // set current time for prompt
    var myBtn = document.getElementById("offline-request"),
      myDiv = document.createElement("div");
    myDiv.setAttribute("class", "journey-notice-image");
    myDiv.innerHTML = `<br><br><hr><div class = "notice"><img class = "journey-notice-icon" src="/images/icons/app-icon-144x144.png">
       <p class="notice">Install this app on YOUR phone without going to the Apple Store.</p>
       <img class = "journey-notice-homescreen" src="/images/installOnIOS.png"></div>`;
    myBtn.parentNode.replaceChild(myDiv, myBtn);
    console.log("I am showing prompt");
    return;
  }
  console.log("I am checking to see if I am online");
  if (navigator.onLine !== false) {
    console.log("I am online");
    var swWorking = localStorage.getItem("swWorking");
    if ("serviceWorker" in navigator && swWorking == "TRUE") {
      console.log("service worker is found");
      console.log("Do I have a local series in cache for " + series);
      inLocalStorage("offline", series).then(function(result) {
        // console.log(result + " is value");
        if (result == "") {
          console.log("I am setting offline-request visible");
          var link = document.getElementById("offline-request");
          link.style.visibility = "visible";
        } else {
          console.log("I am setting offline-ready visible");
          var link = document.getElementById("offline-ready");
          link.style.visibility = "visible";
        }
      });
    } else {
      console.log("No series downloaded yet");
      var link = document.getElementById("offline-request");
      link.style.visibility = "visible";
      //var link = document.getElementById('offline-already');
      //link.style.display = 'none';
    }
  } else {
    console.log("I am offline");
    var readmore = document.getElementsByClassName("readmore");
    if (readmore.length > 0) {
      for (var i = 0; i < readmore.length; i++) {
        readmore[i].style.display = "none";
      }
    }
    var readmore = document.getElementsByClassName("bible_readmore");
    if (readmore.length > 0) {
      for (var i = 0; i < readmore.length; i++) {
        readmore[i].style.display = "none";
      }
    }
  }
}
// this stores series for offline use
// https://developers.google.com/web/ilt/pwa/caching-files-with-service-worker
var el = document.getElementById("offline-request");
if (el) {
  document
    .getElementById("offline-request")
    .addEventListener("click", function(event) {
      event.preventDefault();
      console.log("button pressed");
      var id = this.dataset.json;
      console.log("I am going to fetch" + id);
      var ajaxPromise = fetch(id)
        .then(function(response) {
          console.log("got the index" + id);
          //get-series-urls returns a JSON-encoded array of
          // resource URLs that a given series depends on
          return response.json();
        })
        .then(function(jsonFile) {
          jsonFile.forEach(function(element) {
            console.log(element.url);
            caches.open(CACHE_DYNAMIC_NAME).then(function(cache) {
              cache.add(element.url);
            });
          });
        })
        .then(function() {
          // store that series is available for offline use
          console.log(id + " Series ready for offline use");
          var offline = [];
          var already = "N";
          if (
            typeof localStorage.offline != "undefined" &&
            localStorage.offline
          ) {
            offline = JSON.parse(localStorage.offline); //get existing values
          }
          offline.forEach(function(array_value) {
            if (array_value == id) {
              console.log("stored locally");
              already = "Y";
            }
          });
          console.log(already + " is already");
          if (already != "Y") {
            offline.push(id);
            console.log(offline);
          }
          localStorage.setItem("offline", JSON.stringify(offline)); //put the object back
          // create Ready for offline use by getting it from #offline-ready
          var ready = document.getElementById("offline-ready").innerHTML;
          document.getElementById("offline-request").innerHTML = ready;
          document.getElementById("offline-request").style.background =
            "#00693E";
          // refresh page?
          //var last_page = localStorage.getItem("last_page");
          // window.location.replace(last_page);
        })
        .catch(function(err) {
          console.log(err);
        });
    });
}

// get value of variable in array
// is id in key?
function inLocalStorage(key, id) {
  var deferred = $.Deferred();
  var result = "";
  console.log("looking offline for local storage");
  key_value = localStorage.getItem(key);
  if (typeof key_value != "undefined" && key_value) {
    key_value = JSON.parse(key_value);
    console.log(key_value);
    key_value.forEach(function(array_value) {
      console.log(array_value + "  array value");
      console.log(id + "  id");
      if (array_value == id) {
        console.log("stored locally");
        result = id;
      }
    });
    console.log(result);
  } else {
    result = "";
  }
  if (result == "") {
    console.log("not stored locally");
  }
  deferred.resolve(result);
  return deferred.promise();
}

function dlgOK() {
  var whitebg = document.getElementById("white-background");
  var dlg = document.getElementById("dlgbox");
  whitebg.style.display = "none";
  dlg.style.display = "none";
}
function showDialog(message) {
  var whitebg = document.getElementById("white-background");
  var dlg = document.getElementById("dlgbox");
  //	 whitebg.style.display = "block";
  dlg.style.display = "block";

  var winWidth = window.innerWidth;
  var winHeight = window.innerHeight;
  // dlg.style.left = (winWidth/2) - 480/2 + "px";
  dlg.style.top = "150px";
}

function needsToSeePrompt() {
  if (navigator.standalone) {
    return false;
  }
  let today = new Date();
  let lastPrompt = localStorage.lastSeenPrompt;
  let days = datediff(lastPrompt, today);
  let isApple = ["iPhone", "iPad", "iPod"].includes(navigator.platform);
  return (isNaN(days) || days > 14) && isApple;
}

function datediff(first, second) {
  //  Take the difference between the dates and divide by milliseconds per day.
  //  Round to nearest whole number to deal with DST.
  return Math.round((second - first) / (1000 * 60 * 60 * 24));
}

// for sharing
//https://developers.google.com/web/updates/2016/09/navigator-share
