using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
using UnityEngine.Assertions;

public class player : MonoBehaviour {

	public float speed = 4f;
	public GameObject mensaje;
	public GameObject initialMap;
	public Text count_moneda; 
	public Text count_chest; 
	public AudioClip coin;
	public AudioClip f_chest;
	public AudioClip t_enemy;


    AudioSource audio;

	Animator anim;
	Rigidbody2D rb2d;
	Vector2 mov;  // Ahora es visible entre los métodos
	Vector2 inicio;  // Ahora es visible entre los métodos

	
	int moneda;
	int chest;
	int llave;

	int count_mensajes;

	//GameObject dialogo_1;


	void Awake () {
        // Comprobamos que haya un mapa inicial establecido 
        Assert.IsNotNull(initialMap);
        //dialogo_1 = GameObject.FindGameObjectWithTag("dialogo");
    }

	void Start () {
		anim = GetComponent<Animator>();
		rb2d = GetComponent<Rigidbody2D>();
		inicio = transform.position;
		audio = GetComponent<AudioSource>();
		Camera.main.GetComponent<main_camera>().SetBound(initialMap);
	}

	void Update () {

/*
		if(Input.GetKeyDown("space")){
			if(Time.timeScale == 1){   
		} else if(Time.timeScale == 0) {   
			 Time.timeScale = 1;  
			 mensaje.SetActive(false);
		}
		}

		*/
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
	
		if(col.gameObject.tag == "chest"){
			audio.clip = f_chest;
			audio.Play();
			col.gameObject.SetActive(false);
			Debug.Log ("toco el objeto");
			llave++;
			chest++;
			count_chest.text = ""+chest;

			
		}else if(col.gameObject.tag == "enemigo"){
			
			Debug.Log ("toco al enemigo");
			audio.clip = t_enemy;
			audio.Play();
			//transform.position = new Vector2(-5f , -2.5f);
			transform.position = inicio;
			//mensaje.SetActive(false);
			
		}else if(col.gameObject.tag == "moneda"){			
			moneda++;
			audio.clip = coin;
			audio.Play();
			col.gameObject.SetActive(false);
			count_moneda.text = ""+moneda;
			Debug.Log("monedas: "+moneda);
			
		}
		/*else if(col.gameObject.tag == "puerta"){						
			if (llave==4){
				//carga nueva escena
				Debug.Log("Terminaste nivel");
				Application.LoadLevel("escena1");
			}else{
				//mensaje:
				Debug.Log("Busca llave");
				//Time.timeScale = 0;
				//StartCoroutine(dialogo_1.GetComponent<dialogo>().mostrar_dialogo(1));
				//mensaje.SetActive(true);
			}
						
		}
		*/
	}

	IEnumerator espera()
    {
    	yield return new WaitForSeconds(3);
        mensaje.SetActive(false);

    }


}