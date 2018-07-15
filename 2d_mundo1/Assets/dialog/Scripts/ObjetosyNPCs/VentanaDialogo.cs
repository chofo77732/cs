using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
//using TMPro; //Descoméntalo si usas TextMeshPro

public class VentanaDialogo : MonoBehaviour
{
    //public TextMeshProUGUI campoDeTexto;  //Descoméntalo si usas TextMeshPro
    public GameObject ventanaDialogo;
    public Text campoDeTexto;               //Coméntalo si usas TextMeshPro
    [Tooltip("Si el valor es 0 se mostrará el texto instantáneamente")]
    [Range(0, 0.1f)]
    public float velocidadMensaje = 0.1f;
    [Range(50, 200)]
    public int maximasLetrasPorVentana = 140;
    public string textoCuandoConsigueItem = "Has conseguido";

    private int textoPosicionActual;
    private int textoPosicionFinal;
    private bool hayUnaVentanaAbierta;

    private void OnEnable()
    {
        ControladorEventos.Instancia.SubscribirseEvento(typeof(EventoMostrarMensaje), MostrarMensaje);
        ControladorEventos.Instancia.SubscribirseEvento(typeof(EventoItemConseguido), ItemConseguido);
    }

    private void OnDisable()
    {
        ControladorEventos.Instancia.DesubscribirseEvento(typeof(EventoMostrarMensaje), MostrarMensaje);
        ControladorEventos.Instancia.DesubscribirseEvento(typeof(EventoItemConseguido), ItemConseguido);
    }


    private void MostrarMensaje(EventoBase e)
    {
        EventoMostrarMensaje evento = ((EventoMostrarMensaje)e);
        if (!hayUnaVentanaAbierta && !string.IsNullOrEmpty(evento.Mensaje.texto))
        {
            StartCoroutine(MostrarMensajeCorrutina(evento));
        }
    }

    private IEnumerator MostrarMensajeCorrutina(EventoMostrarMensaje evento)
    {
        yield return StartCoroutine(MostrarTextoCorrutina(evento.Mensaje.texto, false, true, false));

        if(evento.Mensaje.tipoConversacion == TipoConversacion.Luchar)
        {
            //TODO: lanzar evento de combate y esperar a finalizar y que sea ganador (en el evento se incluirá el dinero que gana por vencer
            //TODO: si no ganado enviar al centro pokemon y terminar la corrutina
            //TODO: si gana mostrar texto2
        }

        if (evento.Mensaje.darLogroPorTerminarConversacion != Logro.NINGUNO)
        {
            ControladorDatos.Instancia.AniadirLogro(evento.Mensaje.darLogroPorTerminarConversacion);

            if (evento.Mensaje.darItemPorTerminarConversacion != ItemID.NINGUNO && evento.Mensaje.cantidadDeItems > 0)
            {
                string nombreItem = ItemDatos.Instancia.DatosItemsDiccionario[evento.Mensaje.darItemPorTerminarConversacion].nombre;
                string texto = string.Concat(textoCuandoConsigueItem, " ", nombreItem, " x ", evento.Mensaje.cantidadDeItems);
                ControladorDatos.Instancia.AniadirObjetoAlInventario(evento.Mensaje.darItemPorTerminarConversacion, evento.Mensaje.cantidadDeItems);
                yield return StartCoroutine(MostrarTextoCorrutina(texto, true, false, false));
            }
        }

        DesactivarVentana();
    }

    private void ItemConseguido(EventoBase e)
    {
        EventoItemConseguido item = (EventoItemConseguido)e;
        if (item.itemID != ItemID.NINGUNO && item.cantidad > 0)
        {
            string texto = string.Concat(textoCuandoConsigueItem, " ", item.itemID.ToString(), " x ", item.cantidad);
            StartCoroutine(MostrarTextoCorrutina(texto, true, true, true));
            ControladorDatos.Instancia.AniadirObjetoAlInventario(item.itemID, item.cantidad);
        }
    }


    private IEnumerator MostrarTextoCorrutina(string texto, bool instantaneo, bool activarVentanaDialogo, bool desactivarVentanaAlTerminar)
    {
        if(activarVentanaDialogo)
            ActivarVentana();

        campoDeTexto.text = string.Empty;
        textoPosicionActual = 0;
        texto = texto.Replace("\r", " ").Replace("\n", " ");
        if (instantaneo)
        {
            campoDeTexto.text = texto;
            while (!Input.GetKeyDown(Ajustes.Instancia.teclaInteractuar))
            {
                yield return null;
            }
        }
        else
        {
            while (texto.Length > 0)
            {
                //Comprobamos posición de la última palabra que se admite en el máximo de letras por ventana
                if (texto.Length > maximasLetrasPorVentana)
                    textoPosicionFinal = texto.Substring(0, maximasLetrasPorVentana).LastIndexOf(" ");
                else
                    textoPosicionFinal = texto.Length - 1;
                
                if(velocidadMensaje != 0)
                {
                    //Mientras la posición actual no haya llegado a la final sigue imprimiendo letra a letra
                    while (textoPosicionActual <= textoPosicionFinal)
                    {
                        textoPosicionActual++;
                        campoDeTexto.text = texto.Substring(0, textoPosicionActual);
                        yield return new WaitForSeconds(velocidadMensaje);
                    }
                }
                else
                {
                    campoDeTexto.text = texto.Substring(0, textoPosicionFinal);
                    textoPosicionActual = textoPosicionFinal + 1;
                }

                //Espera a que el jugador pulse la tecla para continuar, ya que hemos llenado una ventana
                while (!Input.GetKeyDown(Ajustes.Instancia.teclaInteractuar))
                {
                    yield return null;
                }

                //Elimina las letras ya mostradas del mensaje
                texto = texto.Remove(0, textoPosicionActual);

                //Devuelve la posición actual a 0 ya que se han eliminado los textos mostrados
                textoPosicionActual = 0;
                campoDeTexto.text = string.Empty;
                yield return null;
            }
        }
        
        if(desactivarVentanaAlTerminar)
            DesactivarVentana();
    }
    
    private void ActivarVentana()
    {
        if (!ventanaDialogo.gameObject.activeSelf)
        {
            hayUnaVentanaAbierta = true;
            Personaje.PuedeMoverse = false;
            ventanaDialogo.gameObject.SetActive(true);
        }        
    }

    private void DesactivarVentana()
    {
        ventanaDialogo.gameObject.SetActive(false);
        Personaje.PuedeMoverse = true;
        hayUnaVentanaAbierta = false;
    }
}
