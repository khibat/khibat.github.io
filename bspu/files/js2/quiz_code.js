window.onload = function () {
    let result = {};
    var w,t,c,s = 0;
    let step = 0;
    function showQuestion(questionNumber) {
        document.querySelector('.question').innerHTML = quiz[step]['q'];
        let answer = '';
        for (let key in quiz[step]['a']) {
            answer += `<li data-v='${key}' class="answer-variant">${quiz[step]['a'][key]}</li>`;
        }
        document.querySelector('.answer').innerHTML = answer;

    }

    document.onclick = function (event) {
        event.stopPropagation();
        if (event.target.classList.contains('answer-variant') && step < quiz.length) {
            // event.target.data
            if (result[event.target.dataset.v] != undefined) {
                result[event.target.dataset.v]++;
            }
            else {
                result[event.target.dataset.v] = 1;
            }
            step++;
            if (step == quiz.length) {
                document.querySelector('.question').remove();
                document.querySelector('.answer').remove();
                showResult();
            }
            else {
                showQuestion();
            }
        }
        if (event.target.classList.contains('reload-button')) {
            location.reload();
        }
    }

    function showResult() {
        let key = Object.keys(result).reduce(function (a, b) { return result[a] > result[b] ? a : b });
        var counter = 0;
        var result_a = [];

        var max = Object.values(result).reduce(function (a, b) {
            return a > b ? a : b;
        });

        for (var keyy in result) {
            if (result[keyy] == max)
                result_a.push(keyy);
        }

        console.log(max);
        w = result.w;
        t = result.t;
        s = result.s;
        c = result.c;
        if (w == undefined)
            w = 0;
        if (t == undefined)
            t = 0;
        if (s == undefined)
            s = 0;
        if (c == undefined)
            c = 0;
        
        var head = {
            "w": " Художественное творчество",
            "t": " Программирование, робототехника, искусственный интеллект",
            "c": " Работа с людьми",
            "s": " Системное мышление"
        }

        let div = document.createElement('div');
        div.classList.add('result');
        if (result_a.length == 2) {
            var head_a = "";
            let cnt = 0;
            for (var i = 0; i < result_a.length; i++) {
                if (cnt == 0)
                    head_a += head[result_a[i]] + " и";
                else
                    head_a += head[result_a[i]];
                cnt++;
            }
            div.innerHTML += "<p style='font-weight:bold'>Близкий вам профиль -"+head_a+"</p><br>";
            for (var i = 0; i < result_a.length; i++) {
                div.innerHTML += answers_a[result_a[i]]['description'];
            }
        } else {
            div.innerHTML = answers[key]['description'];
        }
        
        document.querySelector('main').appendChild(div);

        let percent = document.createElement('div');
        percent.classList.add('percent');
percent.innerHTML = "<p class='percent__p'>Ваши склонности по Художественному творчеству: "+w * 10+"%</p><p class='percent__p'>Ваши склоннсти по Программированию, робототехнике, ии: "+t * 10+"%</p><p class='percent__p'>Ваши склонности по Работе с людьми: "+c * 10+"%</p><p class='percent__p'>Ваши склонности по Системному мышлению: "+s * 10+"%</p>";
        document.querySelector('main').appendChild(percent);

        // if  (result_a.length == 2) {
        //     for (var i = 0; i < result_a.length; i++) {
        //         let img = document.createElement('img');
        //         // img.src = 'images/' + answers[result_a[i]]['image'];
        //         img.classList.add('result-img')
        //         document.querySelector('main').appendChild(img);
        //     }

        // } else {
        //     let img = document.createElement('img');
        //     img.src = 'images/' + answers[key]['image'];
        //     img.classList.add('result-img')
        //     document.querySelector('main').appendChild(img);
        // }

        let reloadButton = document.createElement('button');
        reloadButton.innerHTML = 'Пройти тестирование заново';
        reloadButton.classList.add('reload-button');
        document.querySelector('main').appendChild(reloadButton);
    }

    showQuestion();
}


