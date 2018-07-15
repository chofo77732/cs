using System.Collections;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Teletransportador : MonoBehaviour {
    
    public Image imageDeCarga;
    [Range(0.01f, 0.1f)]
    public float velocidadAparecer = 0.04f;
    [Range(0.01f, 0.1f)]
    public float velocidadOcultar = 0.04f;

    private bool estaTeletransportandose;

    private void Start()
    {
        imageDeCarga.gameObject.SetActive(false);
    }

    private void OnEnable()
    {
        ControladorEventos.Instancia.SubscribirseEvento(typeof(EventoTeletransportarse), Transportar);
    }

    private void OnDisable()
    {
        ControladorEventos.Instancia.DesubscribirseEvento(typeof(EventoTeletransportarse), Transportar);
    }

    private void Transportar(EventoBase mensaje)
    {
        EventoTeletransportarse e = (EventoTeletransportarse)mensaje;
        if (!estaTeletransportandose)
        {
            Personaje.PuedeMoverse = false;
            estaTeletransportandose = true;
            StartCoroutine(MostrarPantallaDeCarga(e.Personaje, e.Destino, e.DireccionMirar));
        }
    }
    

    private IEnumerator MostrarPantallaDeCarga(Personaje personaje, Vector2 destino, Direccion direccionMirar)
    {
        imageDeCarga.gameObject.SetActive(true);
        Color c = imageDeCarga.color;
        c.a = 0.0f;

        //Mientras no esté totalmente visible va aumentando su visibilidad
        while(c.a < 1)
        {
            imageDeCarga.color = c;
            c.a += velocidadAparecer;
            yield return null;
        }


        personaje.CambiarPosicion(destino, Herramientas.ObtenerDireccion(direccionMirar));

        //Mientras la imagen de carga siga visible va desvaneciéndola
        while (c.a > 0)
        {
            imageDeCarga.color = c;
            c.a -= velocidadOcultar;
            yield return null;
        }

        Personaje.PuedeMoverse = true;
        estaTeletransportandose = false;
    }
}
