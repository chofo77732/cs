/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entidades;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
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
 * @author MiguelAngel
 */
@Entity
@Table(name = "employees_audit")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "EmployeesAudit.findAll", query = "SELECT e FROM EmployeesAudit e"),
    @NamedQuery(name = "EmployeesAudit.findById", query = "SELECT e FROM EmployeesAudit e WHERE e.id = :id"),
    @NamedQuery(name = "EmployeesAudit.findByEmployeenumber", query = "SELECT e FROM EmployeesAudit e WHERE e.employeenumber = :employeenumber"),
    @NamedQuery(name = "EmployeesAudit.findByLastname", query = "SELECT e FROM EmployeesAudit e WHERE e.lastname = :lastname"),
    @NamedQuery(name = "EmployeesAudit.findByChangedon", query = "SELECT e FROM EmployeesAudit e WHERE e.changedon = :changedon"),
    @NamedQuery(name = "EmployeesAudit.findByAction", query = "SELECT e FROM EmployeesAudit e WHERE e.action = :action")})
public class EmployeesAudit implements Serializable {
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id")
    private Integer id;
    @Basic(optional = false)
    @NotNull
    @Column(name = "employeenumber")
    private int employeenumber;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 50)
    @Column(name = "lastname")
    private String lastname;
    @Column(name = "changedon")
    @Temporal(TemporalType.TIMESTAMP)
    private Date changedon;
    @Size(max = 50)
    @Column(name = "action")
    private String action;

    public EmployeesAudit() {
    }

    public EmployeesAudit(Integer id) {
        this.id = id;
    }

    public EmployeesAudit(Integer id, int employeenumber, String lastname) {
        this.id = id;
        this.employeenumber = employeenumber;
        this.lastname = lastname;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public int getEmployeenumber() {
        return employeenumber;
    }

    public void setEmployeenumber(int employeenumber) {
        this.employeenumber = employeenumber;
    }

    public String getLastname() {
        return lastname;
    }

    public void setLastname(String lastname) {
        this.lastname = lastname;
    }

    public Date getChangedon() {
        return changedon;
    }

    public void setChangedon(Date changedon) {
        this.changedon = changedon;
    }

    public String getAction() {
        return action;
    }

    public void setAction(String action) {
        this.action = action;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof EmployeesAudit)) {
            return false;
        }
        EmployeesAudit other = (EmployeesAudit) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "entidades.EmployeesAudit[ id=" + id + " ]";
    }
    
}
