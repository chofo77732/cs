using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class NPC : IInteractivo
{
    [HideInInspector]
    public List<Conversacion> listaConversaciones;
    public Sprite mirarAbajo;
    public Sprite mirarArriba;
    public Sprite mirarDerecha;

    private SpriteRenderer spriteRenderer;

    private void Start()
    {
        spriteRenderer = GetComponent<SpriteRenderer>();
    }

    public override void Interactuar(Vector2 direccionPersonaje)
    {
        CambiarSprite(direccionPersonaje);
        MostrarDialogo();
    }

    private void CambiarSprite(Vector2 direccionPersonaje)
    {
        if (direccionPersonaje == Vector2.right)
        {
            spriteRenderer.sprite = mirarDerecha;
            spriteRenderer.flipX = true;
        }
        else if (direccionPersonaje == Vector2.left)
        {
            spriteRenderer.sprite = mirarDerecha;
            spriteRenderer.flipX = false;
        }
        else if (direccionPersonaje == Vector2.down)
        {
            spriteRenderer.sprite = mirarArriba;
        }
        else if (direccionPersonaje == Vector2.up)
        {
            spriteRenderer.sprite = mirarAbajo;
        }
    }

    private void MostrarDialogo()
    {
        for (int i = listaConversaciones.Count - 1; i >= 0; i--)
        {
            //TODO: añadir comprobación del logro en los datos de la partida
            if (listaConversaciones[i].logroConseguido == Logro.NINGUNO || ControladorDatos.Instancia.ContieneLogro(listaConversaciones[i].logroConseguido))
            {
                ControladorEventos.Instancia.LanzarEvento(new EventoMostrarMensaje(listaConversaciones[i]));
                break;
            }
        }
    }
    
}
