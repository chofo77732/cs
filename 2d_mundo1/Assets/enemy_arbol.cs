using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class enemy_arbol : MonoBehaviour {

	// Variables para gestionar el radio de visión y velocidad
	public float visionRadius;
	public float speed;

	// Variable para guardar al jugador
	GameObject player;

	// Variable para guardar la posición inicial
	Vector3 initialPosition;



	Vector2 mov;
	
	int ejey;
	Animator anim;
	void Start () {

		// Recuperamos al jugador gracias al Tag
		player = GameObject.FindGameObjectWithTag("Player");

		// Guardamos nuestra posición inicial
		initialPosition = transform.position;
		anim = GetComponent<Animator>();


	}

	void Update () {

		// Por defecto nuestro objetivo siempre será nuestra posición inicial
		Vector3 target = initialPosition;

		// Pero si la distancia hasta el jugador es menor que el radio de visión el objetivo será él
		float dist = Vector3.Distance(player.transform.position, transform.position);
		if (dist < visionRadius){

			 target = player.transform.position;
			anim.SetBool("player_found", true);

			}else{
			anim.SetBool("player_found", false);
			target = initialPosition;
			}

			if(target == initialPosition){
				anim.SetBool("pos_original", true);
			}else{
				anim.SetBool("pos_original", false);
			}

		// Finalmente movemos al enemigo en dirección a su target
		float fixedSpeed = speed*Time.deltaTime;

		
		//Invoke("cargar_s", 1);
		transform.position = Vector3.MoveTowards(transform.position, target, fixedSpeed);

		// Y podemos debugearlo con una línea
		Debug.DrawLine(transform.position, target, Color.green);


		mov = player.GetComponent<player>().transform.position - transform.position;
		

		
		if(mov.y > 0){
		ejey = 1;
		}else{
			ejey = -1;
		}

		// Establecemos las animaciones
		if (mov != Vector2.zero) {
			anim.SetFloat("ejey", ejey);
			anim.SetBool("wakeup", true);
		} else {
			anim.SetBool("wakeup", false);
		}


 
	}

	// Podemos dibujar el radio de visión sobre la escena dibujando una esfera
    void OnDrawGizmos() {

		Gizmos.color = Color.yellow;
		Gizmos.DrawWireSphere(transform.position, visionRadius);

    }

    IEnumerator espera(Vector3 target)
    {
    	
        yield return new WaitForSeconds(5);
        
    }


void cargar_s(){
Debug.Log ("cargando");
}

}