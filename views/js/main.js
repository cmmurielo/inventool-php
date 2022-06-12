function reloj() {
    momentoActual = new Date()
    fecha = momentoActual.toLocaleDateString()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
    horaImprimible = hora + " : " + minuto + " : " + segundo
    document.getElementById("fechaActual").innerHTML = fecha + " - " + horaImprimible
    setTimeout("reloj()", 1000)
}
