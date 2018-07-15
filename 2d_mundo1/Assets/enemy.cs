using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class enemy : MonoBehaviour {

	// Variables para gestionar el radio de visión y velocidad
	public float visionRadius;
	public float speed;

	// Variable para guardar al jugador
	GameObject player;

	// Variable para guardar la posición inicial
	Vector3 initialPosition;



	Vector2 mov;
	int ejex;
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
		if (dist < visionRadius) target = player.transform.position;

		// Finalmente movemos al enemigo en dirección a su target
		float fixedSpeed = speed*Time.deltaTime;
		transform.position = Vector3.MoveTowards(transform.position, target, fixedSpeed);

		// Y podemos debugearlo con una línea
		Debug.DrawLine(transform.position, target, Color.green);


		mov = player.GetComponent<player>().transform.position - transform.position;
		//Debug.Log ("Soy el enemigo" + mov);

		if(mov.x > 0){
		ejex = 1;
		}else{
			ejex = -1;
		}

		if(mov.y > 0){
		ejey = 1;
		}else{
			ejey = -1;
		}

		// Establecemos las animaciones
		if (mov != Vector2.zero) {
			anim.SetFloat("movX", ejex);
			anim.SetFloat("movY", ejey);
			anim.SetBool("walking", true);
		} else {
			anim.SetBool("walking", false);
		}

if(target == initialPosition){
anim.SetBool("walking", false);
}

 
	}

	// Podemos dibujar el radio de visión sobre la escena dibujando una esfera
    void OnDrawGizmos() {

		Gizmos.color = Color.yellow;
		Gizmos.DrawWireSphere(transform.position, visionRadius);

    }

}