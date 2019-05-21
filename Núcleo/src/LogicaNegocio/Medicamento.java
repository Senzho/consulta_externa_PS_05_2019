package LogicaNegocio;

import java.util.Date;
import java.util.List;

/**
 * @author Victor Javier
 * @version 1.0
 * @created 18-may.-2019 06:27:02 p. m.
 */
public class Medicamento {

    private String codigo;
    private String nombre;
    private float gramaje;
    private Date fechaCaducidad;

    public Medicamento() {

    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public float getGramaje() {
        return gramaje;
    }

    public void setGramaje(float gramaje) {
        this.gramaje = gramaje;
    }

    public Date getFechaCaducidad() {
        return fechaCaducidad;
    }

    public void setFechaCaducidad(Date fechaCaducidad) {
        this.fechaCaducidad = fechaCaducidad;
    }

    public void finalize() throws Throwable {

    }

    public List obtenerMedicamentos() {
        return null;
    }
}//end Medicamento
