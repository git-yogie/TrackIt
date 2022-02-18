
function showBMI(param,tinggi,berat,BMI, color) {
    const target = document.getElementById("result")
    var xhr = new XMLHttpRequest();
    var url = "api/indexBMI.json";
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText)[param]
            let html = `
        <div class="jumbotron-result `+color+`" >
            <h2>`+ data["title"] +`</h2>
            <div class="rows">
                <div class="index">
                    <h3>Index BMI</h3>
                    <h1>`+BMI+`</h1>
                    <span>`+ data["index mass"]+`</span>
                </div>
                <div class="detail">
                    <table>
                        <tr>
                            <td>Tinggi</td>
                            <td> : `+tinggi+` Cm</td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>: `+berat+` Kg</td>
                        </tr>
                    </table>
                    <p>`+data["deskripsi"]+`</p>
                </div>
            </div>
        </div>
         `
         target.innerHTML = html
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
}



function BMICalc() {
    let tinggi = document.getElementById("tinggi").value
    let berat = document.getElementById("berat").value

    let BMI = (berat / ((tinggi * tinggi) / 10000)).toFixed(2)
    if (BMI < 18.5) {
        showBMI(0,tinggi,berat,BMI, "lowIndex")
    } else if (BMI > 18.5 && BMI < 22.9) {
        showBMI(1,tinggi,berat,BMI, "idealIndex")
    } else if (BMI > 22.9 && BMI < 24.9) {
        showBMI(2,tinggi,berat,BMI, "ObesityIndex")
    } else if (BMI > 25 && BMI < 29.9) {
        showBMI(3,tinggi,berat,BMI, "ObesityIndex1")
    } else if (BMI > 30) {
        showBMI(4,tinggi,berat,BMI, "ObesityIndex2")
    }


}
