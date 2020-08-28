function share() {
  var text = "Here is the link to  the MyFriends App: ";
  var subject = "MyFriends Journey";
  if ("share" in navigator) {
    navigator.share({
      title: subject,
      text: text,
      url: location.href
    });
  } else {
    var body = text + location.href;

    // Here we use the WhatsApp API as fallback; remember to encode your text for URI
    //location.href = 'mailto:?body=' + encodeURIComponent(text + ' - ') + location.href + ';subject=' + encodeURIComponent(title);
    location.href = getMailtoUrl("", subject, body);
  }
}
function getMailtoUrl(to, subject, body) {
  var args = [];
  if (typeof subject !== "undefined") {
    args.push("subject=" + encodeURIComponent(subject));
  }
  if (typeof body !== "undefined") {
    args.push("body=" + encodeURIComponent(body));
  }

  var url = "mailto:" + encodeURIComponent(to);
  if (args.length > 0) {
    url += "?" + args.join("&");
  }
  return url;
}
function facebook(account = "339218283324109") {
  var link = "https://facebook.com/" + account;
  let isApple = ["iPhone", "iPad", "iPod"].includes(navigator.platform);
  if (isApple) {
    link = "fb://profile/" + account;
  }
  let isAndroid = ["Android"].includes(navigator.platform);
  if (isApple) {
    link = "fb://page/" + account;
  }
  window.open(link);
}
function question(language = "eng") {
  var link = "";
  switch (language) {
    case "deu":
      link = "https://www.duentscheidest.com";
      break;
    case "eng":
      link = "https://www.everyperson.com";
      break;
    case "fra":
      link = "https://www.questions2vie.com";
      break;
    case "por":
      link = "https://www.suaescolha.com";
      break;
    case "spa":
      link = "https://www.cadaestudiante.com/es/";
      break;
    default:
      link = "https://www.everyperson.com/";
  }

  window.open(link);
}
