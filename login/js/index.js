(function() {
  var darkGrey, emailVerify, emerald, forget, lightGrey, login, passwordSecure, red, signup, submit, toForget, toLogin, toSignup, yellow;

  login = $(".login");
  loginbut = $(".loginbut");

  signup = $(".sign-up");

  forget = $(".forget");

  submit = $('.button');

  emerald = "#19CC8B";

  red = "#BC3E48";

  yellow = "#B8B136";

  lightGrey = "#515866";

  darkGrey = "#2A2D33";

  toLogin = function() {
    $(".security").addClass("hide");
    $(".retype, .retype div").addClass("ani-hide");
    $(".password, .password div").removeClass("ani-hide");
    login.addClass("selected");
    signup.removeClass("selected");
    emailVerify();
    forget.show();
    loginbut.show();
    submit.hide();
    login.html("Login");
    return signup.html("Sign Up");
  };

  toSignup = function() {
    passwordSecure();
    $(".retype, .password").removeClass("ani-hide");
    signup.addClass("selected");
    login.removeClass("selected");
    emailVerify();
    forget.hide();
    submit.show();
    loginbut.hide();
    login.html("Login");
    return signup.html("Sign Up");
  };

  toForget = function() {
    $(".retype, .retype div, .password, .password div .forget").addClass("ani-hide");
    signup.removeClass("selected");
    login.addClass("selected");
    emailVerify();
    forget.hide();
    login.html("Reset Password");
    return signup.html("Back");
  };

  emailVerify = function() {
    var checkInterval, myInterval;
    if ($(".login").hasClass("selected")) {
      checkInterval = 0;
      return myInterval = setInterval((function() {
        if ($(".email .content").val().length >= 18) {
          $(".profile-img").addClass("profile-pic");
          $(".profile-add").hide();
          clearInterval(myInterval);
        }
        if (checkInterval === 250) {
          clearInterval(myInterval);
        }
        return checkInterval++;
      }), 250);
    } else {
      $(".profile-add").show();
      return $(".profile-img").removeClass("profile-pic");
    }
  };

  passwordSecure = function() {
    var checkInterval, myInterval;
    checkInterval = 0;
    return myInterval = setInterval((function() {
      var backFill, color, pie1, pieColor, secureVal, value;
      value = $(".password .content").val();
      if (value.length > 0 && value.length < 4) {
        color = red;
        backFill = red;
      } else if (value.length >= 5 && value.length < 7) {
        color = yellow;
        backFill = yellow;
      } else if (value.length >= 8) {
        color = emerald;
        backFill = emerald;
      }
      if (value.length > 0) {
        $(".security").removeClass("hide");
      } else {
        $(".security").addClass("hide");
      }
      secureVal = value.length * 9;
      if (secureVal >= 100) {
        secureVal = 100;
      }
      if (value.length <= 5) {
        pie1 = (value.length * 36) + 90;
        pieColor = lightGrey;
      } else if (value.length >= 5 && value.length <= 9) {
        pieColor = color;
        pie1 = (value.length * 36) - 90;
      } else {
        secureVal = 90;
        pie1 = 270;
      }
      $(".secureValue").html(secureVal);
      $(".password .content, .password .security-type").css("color", `${color}`);
      $(".circle.background").css("background", `${backFill}`);
      $(".password .fill").css({
        background: `linear-gradient(${pie1}deg, transparent 50%, ${pieColor} 50%), linear-gradient(90deg, ${lightGrey} 50%, transparent 50%)`
      });
      if (checkInterval === 250) {
        clearInterval(myInterval);
      }
      login.click(function() {
        $(".password .content").css("color", "#fff");
        return clearInterval(myInterval);
      });
      return checkInterval++;
    }), 250);
  };

  login.click(function() {
    if (!login.hasClass("selected")) {
      return toLogin();
    }
  });

  signup.click(function() {
    if ($(".password").hasClass("ani-hide")) {
      return toLogin();
    } else if (!signup.hasClass("selected")) {
      return toSignup();
    }
  });

  submit.click(function() {
    if ($(".password").hasClass("ani-hide")) {
      $(".text-wrapper").removeClass("show");
      $(".load-gif").addClass("show");
      return setTimeout((function() {
        toLogin();
        $(".text-wrapper").addClass("show");
        return $(".load-gif").removeClass("show");
      }), 2500);
    }
  });

  loginbut.click(function() {

    const url = "https://hostname/login";
           const data = {"email" : document.getElementById('email').value,
                        "username" : document.getElementById('username').value,
                       'password' : document.getElementById('password').value
                       };
           const other_params = {
               headers : { "content-type" : "application/json; charset=UTF-8"},
               body : data,
               method : "POST",
               mode : "cors"
           };
    // Open a new connection, using the GET request on the URL endpoint
    //request.open('POST', 'http://leobox.org:8080/v1/ui/user/create?email=&username=&password=', true);




  });

  forget.click(function() {
    return toForget();
  });

  $(".password .content").click(function() {
    if ($(".sign-up").hasClass("selected")) {
      return passwordSecure();
    }
  });

  $(".email .content").click(() => {
    return emailVerify();
  });
toLogin()
}).call(this);
