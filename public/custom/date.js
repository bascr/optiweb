/**
 * Created by bascr on 25-04-2017.
 */
function date() {
        var hoy = new Date();
        var m = [];
        var d = [];
        var an = hoy.getUTCFullYear();
        var day = hoy.getDay();
        d[1]="Lunes";d[2]="Martes";d[3]="Miercoles";d[4]="Jueves";d[5]="Viernes";d[6]="Sábado";d[0]="Domingo";
        m[0]="Enero"; m[1]="Febrero"; m[2]="Marzo";
        m[3]="Abril"; m[4]="Mayo"; m[5]="Junio";
        m[6]="Julio"; m[7]="Agosto"; m[8]="Septiembre";
        m[9]="Octubre"; m[10]="Noviembre"; m[11]="Diciembre";
        document.write(d[hoy.getDay()]);
        document.write(" " + hoy.getDate());
        document.write(" de ");
        document.write(m[hoy.getMonth()]);
        document.write(" del " + an);
}
