/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entidades;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.EmbeddedId;
import javax.persistence.Entity;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author MiguelAngel
 */
@Entity
@Table(name = "orderdetails")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Orderdetails.findAll", query = "SELECT o FROM Orderdetails o"),
    @NamedQuery(name = "Orderdetails.findByOrderNumber", query = "SELECT o FROM Orderdetails o WHERE o.orderdetailsPK.orderNumber = :orderNumber"),
    @NamedQuery(name = "Orderdetails.findByProductCode", query = "SELECT o FROM Orderdetails o WHERE o.orderdetailsPK.productCode = :productCode"),
    @NamedQuery(name = "Orderdetails.findByQuantityOrdered", query = "SELECT o FROM Orderdetails o WHERE o.quantityOrdered = :quantityOrdered"),
    @NamedQuery(name = "Orderdetails.findByPriceEach", query = "SELECT o FROM Orderdetails o WHERE o.priceEach = :priceEach"),
    @NamedQuery(name = "Orderdetails.findByOrderLineNumber", query = "SELECT o FROM Orderdetails o WHERE o.orderLineNumber = :orderLineNumber")})
public class Orderdetails implements Serializable {
    private static final long serialVersionUID = 1L;
    @EmbeddedId
    protected OrderdetailsPK orderdetailsPK;
    @Basic(optional = false)
    @NotNull
    @Column(name = "quantityOrdered")
    private int quantityOrdered;
    @Basic(optional = false)
    @NotNull
    @Column(name = "priceEach")
    private double priceEach;
    @Basic(optional = false)
    @NotNull
    @Column(name = "orderLineNumber")
    private short orderLineNumber;

    public Orderdetails() {
    }

    public Orderdetails(OrderdetailsPK orderdetailsPK) {
        this.orderdetailsPK = orderdetailsPK;
    }

    public Orderdetails(OrderdetailsPK orderdetailsPK, int quantityOrdered, double priceEach, short orderLineNumber) {
        this.orderdetailsPK = orderdetailsPK;
        this.quantityOrdered = quantityOrdered;
        this.priceEach = priceEach;
        this.orderLineNumber = orderLineNumber;
    }

    public Orderdetails(int orderNumber, String productCode) {
        this.orderdetailsPK = new OrderdetailsPK(orderNumber, productCode);
    }

    public OrderdetailsPK getOrderdetailsPK() {
        return orderdetailsPK;
    }

    public void setOrderdetailsPK(OrderdetailsPK orderdetailsPK) {
        this.orderdetailsPK = orderdetailsPK;
    }

    public int getQuantityOrdered() {
        return quantityOrdered;
    }

    public void setQuantityOrdered(int quantityOrdered) {
        this.quantityOrdered = quantityOrdered;
    }

    public double getPriceEach() {
        return priceEach;
    }

    public void setPriceEach(double priceEach) {
        this.priceEach = priceEach;
    }

    public short getOrderLineNumber() {
        return orderLineNumber;
    }

    public void setOrderLineNumber(short orderLineNumber) {
        this.orderLineNumber = orderLineNumber;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (orderdetailsPK != null ? orderdetailsPK.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Orderdetails)) {
            return false;
        }
        Orderdetails other = (Orderdetails) object;
        if ((this.orderdetailsPK == null && other.orderdetailsPK != null) || (this.orderdetailsPK != null && !this.orderdetailsPK.equals(other.orderdetailsPK))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "entidades.Orderdetails[ orderdetailsPK=" + orderdetailsPK + " ]";
    }
    
}
