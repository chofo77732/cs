using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CentroPokemon : MonoBehaviour {

    public static List<Transform> centrosPokemon = new List<Transform>();

    private void OnEnable()
    {
        centrosPokemon.Add(transform);
        ControladorEventos.Instancia.SubscribirseEvento(typeof(EventoTeletransportarseCentroPokemon), TeletranportarCentroPokemon);
    }

    private void OnDisable()
    {
        centrosPokemon.Remove(transform);
        ControladorEventos.Instancia.DesubscribirseEvento(typeof(EventoTeletransportarseCentroPokemon), TeletranportarCentroPokemon);
    }

    private void TeletranportarCentroPokemon(EventoBase mensaje)
    {
        EventoTeletransportarseCentroPokemon e = (EventoTeletransportarseCentroPokemon)mensaje;
        Vector2 puntoMasCercano = Vector2.zero;
        float distancia1;
        float distancia2;
        for (int i = 0; i < centrosPokemon.Count; i++)
        {
            if(i == 0)
            {
                puntoMasCercano = centrosPokemon[i].position;
            }
            else
            {
                distancia1 = Vector2.Distance(centrosPokemon[i].position, e.Personaje.transform.position);
                distancia2 = Vector2.Distance(puntoMasCercano, e.Personaje.transform.position);
                if (distancia1 < distancia2)
                    puntoMasCercano = centrosPokemon[i].position;
            }            
        }

        if(puntoMasCercano == Vector2.zero)
        {
            Debug.LogWarning("No se ha encontrado ningún centro Pokémon");
        }
        else
        {
            ControladorEventos.Instancia.LanzarEvento(new EventoTeletransportarse(puntoMasCercano, e.Personaje, Direccion.Arriba));
        }
    }

    
    

#if UNITY_EDITOR
    private void OnDrawGizmos()
    {        
        Gizmos.DrawSphere(transform.position, 0.16f);
    }
#endif

    
}
