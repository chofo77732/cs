﻿using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Personaje : MonoBehaviour {
    
    //PRIVATE
    private Vector2 siguientePosicion;
    private Vector2 siguienteDireccion;
    private Vector2 ultimaDireccion;
    private float velocidadActual;
    private SpriteRenderer spriteRenderer;
    private Animator anim;

    //PROPIEDADES
    public static bool PuedeMoverse { get; set; }

    private void Start ()
    {
        anim = GetComponent<Animator>();
        spriteRenderer = GetComponent<SpriteRenderer>();
        siguientePosicion = transform.position;
        velocidadActual = Ajustes.Instancia.velocidadAndar;
        PuedeMoverse = true;
    }
    
    private void Update()
    {
        if (PuedeMoverse)
        {
            AsignarVelocidadMovimiento();
            AsignarDireccionMovimiento();
            Interactuar();
        }

        Mover();
    }

    private void FixedUpdate()
    {
        DetenerAnimacion();
    }

    private void AsignarVelocidadMovimiento()
    {
        if (Input.GetKey(Ajustes.Instancia.teclaCorrer))
        {
            velocidadActual = Ajustes.Instancia.velocidadCorrer;
        }
        else
        {
            velocidadActual = Ajustes.Instancia.velocidadAndar;
        }
    }

    private void AsignarDireccionMovimiento()
    {
        if (Input.GetAxis("Horizontal") > 0)
        {
            siguienteDireccion = Vector2.right;
            if (PuedeMoverseALaSiguienteCasilla())
            {
                AsignarAnimacion();
                siguientePosicion.x += Ajustes.Instancia.tamanioCasilla;
            }
        }
        else if (Input.GetAxis("Horizontal") < 0)
        {
            siguienteDireccion = Vector2.left;
            if (PuedeMoverseALaSiguienteCasilla())
            {
                AsignarAnimacion();
                siguientePosicion.x -= Ajustes.Instancia.tamanioCasilla;
            }
        }
        else if (Input.GetAxis("Vertical") > 0)
        {
            siguienteDireccion = Vector2.up;
            if (PuedeMoverseALaSiguienteCasilla())
            {
                AsignarAnimacion();
                siguientePosicion.y += Ajustes.Instancia.tamanioCasilla;
            }
        }
        else if (Input.GetAxis("Vertical") < 0)
        {
            siguienteDireccion = Vector2.down;
            if (PuedeMoverseALaSiguienteCasilla())
            {
                AsignarAnimacion();
                siguientePosicion.y -= Ajustes.Instancia.tamanioCasilla;
            }
        }
        else
        {
            siguienteDireccion = Vector2.zero;
        }
        
        if (siguienteDireccion != Vector2.zero)
            ultimaDireccion = siguienteDireccion;
    }

    private void Mover()
    {
        transform.position = Vector2.MoveTowards(transform.position, siguientePosicion, velocidadActual * Time.deltaTime);
    }

    private bool PuedeMoverseALaSiguienteCasilla()
    {
        //Si en la dirección del próximo movimiento hay un collider del layer definido como obstáculo no se puede mover
        if (Physics2D.Raycast(transform.position, siguienteDireccion, Ajustes.Instancia.tamanioCasilla, Ajustes.Instancia.layerColision))
        {
            AsignarAnimacion();
            return false;
        }
        //Si está casi en la siguiente posición sí puede volver a moverse
        else if (Vector2.Distance(siguientePosicion, transform.position) < float.Epsilon)
        {
            return true;
        }
        return false;
    }

    private void DetenerAnimacion()
    {
        if (!PuedeMoverse || (anim.speed != 0 && Vector2.Distance(siguientePosicion, transform.position) == 0 && siguienteDireccion == Vector2.zero))
        {            
            anim.speed = 0;
            anim.Play(anim.GetCurrentAnimatorStateInfo(0).fullPathHash, 0, 0);
        }
        else if(anim.speed != 1)
        {
            anim.speed = 1;
        }            
    }

    private void AsignarAnimacion()
    {
        if (siguienteDireccion == Vector2.left)
        {
            spriteRenderer.flipX = true;
        }
        else if (siguienteDireccion == Vector2.right)
        {
            spriteRenderer.flipX = false;
        }
        if(siguienteDireccion != Vector2.zero)
        {
            anim.SetFloat("DireccionX", siguienteDireccion.x);
            anim.SetFloat("DireccionY", siguienteDireccion.y);
        }            
    }

    public void CambiarPosicion(Vector2 nuevaPosicion, Vector2 direccionMirar)
    {        
        transform.position = nuevaPosicion;
        siguientePosicion = transform.position;

        if (direccionMirar != Vector2.zero)
        {
            siguienteDireccion = direccionMirar;
            AsignarAnimacion();
        }
    }

    private void Interactuar()
    {        
        if (Input.GetKeyDown(Ajustes.Instancia.teclaInteractuar))
        {
            RaycastHit2D hit = Physics2D.Raycast(transform.position, ultimaDireccion, Ajustes.Instancia.tamanioCasilla, Ajustes.Instancia.layerColision);
            if (hit.collider != null && hit.collider.gameObject.CompareTag(Ajustes.Instancia.tagInteraccion))
            {
                hit.collider.gameObject.GetComponent<IInteractivo>().Interactuar(ultimaDireccion);
            }
        }
    }


}
