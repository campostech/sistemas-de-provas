function montaGrafico(dados, idElemento="", tipoDoGrafico="pie", idSemConetudo=""){
    
    if(!(!!dados)){        
        document.getElementById(idSemConetudo).innerHTML = '<div class="sem-conteudo"><div class="sem-conteudo-icon"><i class="fas fa-mug-hot"></i></div><div class="sem-conteudo-texto"><p>Nenhum registro foi carregado</p></div></div>'        
        return false
    }

    console.log(dados)

    
    let labelsIn = []
    
    dados.forEach(element => {
        labelsIn.push(element.label)
    });   

    let datasetIn = []
    
    dados.forEach(element => {
        datasetIn.push(element.dataset)
    });

    let colors = []

    dados.forEach(element => {
        if(element.color == ""){
            colors.push(random_rgba())
            //colors.push(getRandomColor())
        }
        else{
            colors.push(element.color)
        }
        
    })
    
    
    //monta grafico
    var ctx = document.getElementById(idElemento);
    var myChart = new Chart(ctx, {
    type: tipoDoGrafico,
    data: {
        labels: labelsIn,
        datasets: [{
            label: labelsIn,
            data: datasetIn,
            backgroundColor: colors,
            borderColor: colors,
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
        
}



function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  
  function setRandomColor() {
    $("#colorpad").css("background-color", getRandomColor());
  }


function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 0.9 + ')';
}