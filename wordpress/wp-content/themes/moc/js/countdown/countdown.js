(function () {

    const element = document.querySelector("body"),
        containClass = element.classList.contains("single-webinars"),
        countWrapper = document.querySelector('.countdown-wrapper');

    if (containClass && countWrapper) {

        const currentDay = document.getElementById("date-value").innerText,
            currentTime = document.getElementById("time-value").innerText,
            currentDate = currentDay + ' ' + currentTime;

        let second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;


        let date = currentDate,
            countDown = new Date(date).getTime(),
            x = setInterval(function () {

                let now = new Date().getTime(),
                    distance = countDown - now;
                let days = Math.floor(distance / (day)),
                    hours =  Math.floor((distance % (day)) / (hour)),
                    minutes = Math.floor((distance % (hour)) / (minute)),
                    seconds = Math.floor((distance % (minute)) / second);

                if(days < 10){days = "0" + days;}
                if(hours < 10){hours = "0" + hours;}
                if(minutes < 10){minutes = "0" + minutes;}
                if(seconds < 10){seconds = "0" + seconds;}

                    document.getElementById("days").innerText = days;
                    document.getElementById("hours").innerText = hours;
                    document.getElementById("minutes").innerText = minutes;
                    document.getElementById("seconds").innerText = seconds;

                //do something later when date is reached
                if (distance < 0) {
                    let countdown = document.getElementById("countdown");

                    countdown.style.display = "none";

                    clearInterval(x);
                }
                //seconds
            }, 0)
    }
}());