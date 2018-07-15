using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ObservadorEscenario : MonoBehaviour {

    public string nombreZona;
    public GameObject ElementosDelEscenario;
    public List<AccionesEscenario> observarLogros;
    public List<FasesEscenario> fases;

    private List<AccionesEscenario> logrosNoCumplidos = new List<AccionesEscenario>();
    private Logro ultimoLogroActivado = Logro.NINGUNO;

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if (collision.CompareTag("Player"))
        {
            Debug.Log(string.Concat("Has entrado a ", nombreZona));

            if (ElementosDelEscenario != null)
                ElementosDelEscenario.SetActive(true);

            for (int i = fases.Count - 1; i >= 0; i--)
            {
                if(ControladorDatos.Instancia.ContieneLogro(fases[i].logroConseguido))
                {
                    //Si no es la fase del logro por defecto o la última cargada, activa y desactiva los objetos correspondientes
                    if(fases[i].logroConseguido != Logro.NINGUNO && fases[i].logroConseguido != ultimoLogroActivado)
                    {
                        ultimoLogroActivado = fases[i].logroConseguido;
                        fases[i].ActivarFase();
                    }
                    break;
                }
            }

            for (int i = 0; i < observarLogros.Count; i++)
            {
                if (observarLogros[i].logroObservado != Logro.NINGUNO && !ControladorDatos.Instancia.ContieneLogro(observarLogros[i].logroObservado))
                {
                    logrosNoCumplidos.Add(observarLogros[i]);
                }
            }
            if (logrosNoCumplidos.Count > 0)
                StartCoroutine(ObservarLogroCorrutina());
        }        
    }


    private void OnTriggerExit2D(Collider2D collision)
    {
        StopAllCoroutines();
        logrosNoCumplidos.Clear();
        if (ElementosDelEscenario != null)
            ElementosDelEscenario.SetActive(false);
    }

    private IEnumerator ObservarLogroCorrutina()
    {
        while (true)
        {
            for (int i = 0; i < logrosNoCumplidos.Count; i++)
            {
                if (ControladorDatos.Instancia.ContieneLogro(logrosNoCumplidos[i].logroObservado))
                {
                    for (int j = 0; j < logrosNoCumplidos[i].bloqueDeAcciones.Count; j++)
                    {
                        if(logrosNoCumplidos[i].bloqueDeAcciones[j] != null)
                        {
                            yield return new WaitForSeconds(logrosNoCumplidos[i].bloqueDeAcciones[j].tiempoEsperaHastaEjecutarAcciones);
                            logrosNoCumplidos[i].bloqueDeAcciones[j].accionesAlCumplirLogro.Invoke();
                        }

                    }
                    logrosNoCumplidos.RemoveAt(i);
                    break;
                }
                yield return null;
            }
            yield return new WaitForSeconds(0.3f);
        }
    }

    
}
