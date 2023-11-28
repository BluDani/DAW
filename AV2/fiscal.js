function ListarFiscais(){

    let xmlhttp = new XMLHttpRequest();
    console.log("1");

    xmlhttp.onreadystatechange = function(){

    if (this.readyState == 4 && this.status == 200){

        console.log("Chegou a resposta OK: " + this.responseText);
        console.log("2");
        let objReturnJSON = JSON.parse(this.responseText);

        // tornando o cabeçalho visível
        document.getElementById("tab").style.display="block";
        CriarCabecalhoFiscal();

        for (let i = 0; i < objReturnJSON.length; i++) {
        let linha = objReturnJSON[i];
        CriarLinhaTabelaFiscal(linha);
        }
    } 
    else if(this.readyState < 4){

        console.log("3: " + this.readyState);
    } 
    else{

        console.log("Requisicao falhou: " + this.status);
    }
    }

    console.log("4");
    xmlhttp.open("GET", "http://localhost/DAW/AV2/listarFiscal.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();

    console.log("enviei request get");
    console.log("5");
}

//Cria cabeçalho da tabela
function CriarCabecalhoFiscal(){

    let table = document.getElementById("tab");

    let tr = document.createElement("tr");

    let th1 = document.createElement("th");
    th1.textContent = "Nome";
    tr.appendChild(th1);

    let th2 = document.createElement("th");
    th2.textContent = "CPF";
    tr.appendChild(th2);

    let th3 = document.createElement("th");
    th3.textContent = "Sala de prova";
    tr.appendChild(th3);

    table.appendChild(tr);
}

//Cria linha na tabela
function CriarLinhaTabelaFiscal(pobjReturnJSON){

    let table = document.getElementById("tab");

    let tr = document.createElement("tr");

    let td1 = document.createElement("td");
    td1.textContent = pobjReturnJSON.nome;
    tr.appendChild(td1);

    let td2 = document.createElement("td");
    td2.textContent = pobjReturnJSON.cpf;
    tr.appendChild(td2);

    let td3 = document.createElement("td");
    td3.textContent = pobjReturnJSON.sala;
    tr.appendChild(td3);

    tr.appendChild(td3);

    // Adicionando a nova linha antes da última linha existente
    table.appendChild(tr);
}

//Apaga formulario fiscal
function DeletarFormFiscal(){

    document.getElementById("nome_fiscal").value = "";
    document.getElementById("cpf_fiscal").value = "";
    document.getElementById("sala_fiscal").value = "";
}


function InserirFiscal(){

    let form = document.getElementById("fiscal");
    console.log("Form: " + form.innerHTML);

    let nome = document.getElementById("nome_fiscal").value;
    let cpf = document.getElementById("cpf_fiscal").value;
    let sala = document.getElementById("sala_fiscal").value;
    console.log(" nome: " + nome + " cpf: " + cpf + " sala: " + sala);

    let form2 = {"nome":nome,"cpf":cpf,"sala":sala};
    let objJson = JSON.stringify(form2);
    console.log("objForm2: " + form2);
    console.log("JSON: " + objJson);

    //codigo copiado
    let xmlhttp = new XMLHttpRequest();
    console.log("1");

    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            console.log("Chegou a resposta OK: " + this.responseText);
            console.log("2");
        }
        else if (this.readyState < 4){

            console.log("3: " + this.readyState);
        } 
        else{

            console.log("Requisicao falhou: " + this.status);
        }
            
    }
    console.log("4");

    xmlhttp.open("POST", "http://localhost/DAW/AV2/adicionarFiscal.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&cpf=" + cpf + "&sala=" + sala);

    console.log("enviei form");
    console.log("5");
}