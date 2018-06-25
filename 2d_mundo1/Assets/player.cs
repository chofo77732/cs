using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class player : MonoBehaviour {

	public float speed = 4f;
	public GameObject mensaje;


	Animator anim;
	Rigidbody2D rb2d;
	Vector2 mov;  // Ahora es visible entre los métodos
	Vector2 inicio;  // Ahora es visible entre los métodos


	void Start () {
		anim = GetComponent<Animator>();
		rb2d = GetComponent<Rigidbody2D>();
		inicio = transform.position;
	}

	void Update () {

		if(Input.GetKeyDown("space")){
			if(Time.timeScale == 1){   
		} else if(Time.timeScale == 0) {   
			 Time.timeScale = 1;  
			 mensaje.SetActive(false);
		}

		}
		// Detectamos el movimiento en un vector 2D
		mov = new Vector2(
			Input.GetAxisRaw("Horizontal"),
			Input.GetAxisRaw("Vertical")
		);

		// Establecemos las animaciones
		if (mov != Vector2.zero) {
			anim.SetFloat("movX", mov.x);
			anim.SetFloat("movY", mov.y);
			anim.SetBool("walking", true);
		} else {
			anim.SetBool("walking", false);
		}

	}

	void FixedUpdate () {
		// Nos movemos en el fixed por las físicas
		rb2d.MovePosition(rb2d.position + mov * speed * Time.deltaTime);
	}


		void OnTriggerEnter2D(Collider2D col){
	
		if(col.gameObject.tag == "prueba"){
			
			col.gameObject.SetActive(false);
			//mensaje.SetActive(true);
			//StartCoroutine(espera());
			Debug.Log ("toco el objeto");
			//mensaje.SetActive(false);

			Time.timeScale = 0;
			mensaje.SetActive(true);

			
		}else if(col.gameObject.tag == "enemigo"){
			
			Debug.Log ("toco al enemigo");
			transform.position = new Vector2(0,0);
			//mensaje.SetActive(false);
			
		}
	}

	IEnumerator espera()
    {
    	yield return new WaitForSeconds(3);
        mensaje.SetActive(false);

    }
}