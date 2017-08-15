/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import entidades.Productlines;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author MiguelAngel
 */
@Local
public interface ProductlinesFacadeLocal {

    void create(Productlines productlines);

    void edit(Productlines productlines);

    void remove(Productlines productlines);

    Productlines find(Object id);

    List<Productlines> findAll();

    List<Productlines> findRange(int[] range);

    int count();
    
}
