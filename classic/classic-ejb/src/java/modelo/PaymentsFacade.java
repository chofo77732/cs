/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import entidades.Payments;
import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

/**
 *
 * @author MiguelAngel
 */
@Stateless
public class PaymentsFacade extends AbstractFacade<Payments> implements PaymentsFacadeLocal {
    @PersistenceContext(unitName = "classic-ejbPU")
    private EntityManager em;

    @Override
    protected EntityManager getEntityManager() {
        return em;
    }

    public PaymentsFacade() {
        super(Payments.class);
    }
    
}
