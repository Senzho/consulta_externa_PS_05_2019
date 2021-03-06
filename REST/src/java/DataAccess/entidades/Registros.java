/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DataAccess.entidades;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Victor Javier
 */
@Entity
@Table(name = "registros")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Registros.findAll", query = "SELECT r FROM Registros r")
    , @NamedQuery(name = "Registros.findByRegId", query = "SELECT r FROM Registros r WHERE r.regId = :regId")
    , @NamedQuery(name = "Registros.findByRegHoraEntrada", query = "SELECT r FROM Registros r WHERE r.regHoraEntrada = :regHoraEntrada")
    , @NamedQuery(name = "Registros.findByRegHoraSalida", query = "SELECT r FROM Registros r WHERE r.regHoraSalida = :regHoraSalida")
    , @NamedQuery(name = "Registros.findByRegLugarEstadia", query = "SELECT r FROM Registros r WHERE r.regLugarEstadia = :regLugarEstadia")
    , @NamedQuery(name = "Registros.findBySalidaNula", query = "SELECT r FROM Registros r WHERE r.personalPrRfc.prRfc = :prRfc AND r.regHoraSalida IS NULL")
    , @NamedQuery(name = "Registros.salida", query = "UPDATE Registros r SET r.regHoraSalida = :regHoraSalida WHERE r.regId = :regId")})
public class Registros implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "reg_id")
    private Integer regId;
    @Basic(optional = false)
    @NotNull
    @Column(name = "reg_hora_entrada")
    @Temporal(TemporalType.TIME)
    private Date regHoraEntrada;
    @Basic(optional = false)
    @Column(name = "reg_hora_salida")
    @Temporal(TemporalType.TIME)
    private Date regHoraSalida;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "reg_lugar_estadia")
    private String regLugarEstadia;
    @JoinColumn(name = "personal_pr_rfc", referencedColumnName = "pr_rfc")
    @ManyToOne(optional = false)
    private Personal personalPrRfc;

    public Registros() {
    }

    public Registros(Integer regId) {
        this.regId = regId;
    }

    public Registros(Integer regId, Date regHoraEntrada, Date regHoraSalida, String regLugarEstadia) {
        this.regId = regId;
        this.regHoraEntrada = regHoraEntrada;
        this.regHoraSalida = regHoraSalida;
        this.regLugarEstadia = regLugarEstadia;
    }

    public Integer getRegId() {
        return regId;
    }

    public void setRegId(Integer regId) {
        this.regId = regId;
    }

    public Date getRegHoraEntrada() {
        return regHoraEntrada;
    }

    public void setRegHoraEntrada(Date regHoraEntrada) {
        this.regHoraEntrada = regHoraEntrada;
    }

    public Date getRegHoraSalida() {
        return regHoraSalida;
    }

    public void setRegHoraSalida(Date regHoraSalida) {
        this.regHoraSalida = regHoraSalida;
    }

    public String getRegLugarEstadia() {
        return regLugarEstadia;
    }

    public void setRegLugarEstadia(String regLugarEstadia) {
        this.regLugarEstadia = regLugarEstadia;
    }

    public Personal getPersonalPrRfc() {
        return personalPrRfc;
    }

    public void setPersonalPrRfc(Personal personalPrRfc) {
        this.personalPrRfc = personalPrRfc;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (regId != null ? regId.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Registros)) {
            return false;
        }
        Registros other = (Registros) object;
        if ((this.regId == null && other.regId != null) || (this.regId != null && !this.regId.equals(other.regId))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "DataAccess.entidades.Registros[ regId=" + regId + " ]";
    }
    
}
