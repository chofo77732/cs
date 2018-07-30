using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
using UnityEngine.Assertions;

public class player : MonoBehaviour {

	public float speed = 4f;
	public GameObject initialMap;
	public Text count_moneda; 
	public Text count_chest; 
	public Text count_item; 
	public AudioClip coin;
	public AudioClip f_chest;
	public AudioClip t_enemy;
	public GameObject panel;
	public Text mensaje;
	public Button btn_next;
	public GameObject menu;

	Button boton;

    AudioSource audio;

	Animator anim;
	Rigidbody2D rb2d;
	Vector2 mov;  // Ahora es visible entre los métodos
	Vector2 inicio;  
	Vector2 checkpoint; 
	int cp=0; 

	GameObject actual_chest;
	GameObject actual_door;

	
	int moneda=0;
	int item=0;
	int chest=0;
	int llave=0;

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
		panel.SetActive(false);
		audio = GetComponent<AudioSource>();
		Camera.main.GetComponent<main_camera>().SetBound(initialMap);

		boton = btn_next.GetComponent<Button>();
		boton.onClick.AddListener(boton_next);
		
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

			// Input.acceleration.x,
			// Input.acceleration.y

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
			
			Debug.Log ("toco el objeto");
			llave++;
			chest++;
			count_chest.text = ""+chest;

			
			Time.timeScale = 0; 
			menu.SetActive(false);
			panel.SetActive(true);
			string msg = col.GetComponent<chest_v2>().getMensaje();
			actual_chest = col.gameObject;
			mensaje.text = msg;


			
		}else if(col.gameObject.tag == "enemigo"){
			
			Debug.Log ("toco al enemigo");
			audio.clip = t_enemy;
			audio.Play();
			//transform.position = new Vector2(-5f , -2.5f);
			if(cp==0){
				transform.position = inicio;
			}else{
			transform.position = checkpoint;
			}
			//mensaje.SetActive(false);
			
		}else if(col.gameObject.tag == "moneda"){			
			moneda++;
			audio.clip = coin;
			audio.Play();
			col.gameObject.SetActive(false);
			count_moneda.text = ""+moneda;
			Debug.Log("monedas: "+moneda);
			
		}else if(col.gameObject.tag == "item"){			
			item++;
			audio.clip = coin;
			audio.Play();
			col.gameObject.SetActive(false);
			count_item.text = ""+item;
			
		}else if(col.gameObject.tag == "checkpoint"){	
		Debug.Log ("checkpoint");		
			checkpoint = col.transform.position;
			cp++;
			
		}
		// else if(col.gameObject.tag == "puerta"){

		// 	boton.onClick.AddListener(next_puerta);
		// 	Debug.Log("puerta");
		// 	Time.timeScale = 0; 
		// 	menu.SetActive(false);
		// 	panel.SetActive(true);
		// 	string msg = col.GetComponent<puerta_v2>().getMensaje_chest();
		// 	actual_door = col.gameObject;
		// 	mensaje.text = msg;

		// }	
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

	public void boton_next(){
		if(actual_chest){
			actual_chest.GetComponent<chest_v2>().boton_next();
			

			int tama = actual_chest.GetComponent<chest_v2>().getTama();
			int index = actual_chest.GetComponent<chest_v2>().getIndex();
			if(index < tama-1){
				
				string mensaje_act = actual_chest.GetComponent<chest_v2>().getMensaje();
			mensaje.text = mensaje_act;
			}else if(index == tama-1){
				actual_chest.GetComponent<chest_v2>().reproducir(audio);
				string mensaje_act = actual_chest.GetComponent<chest_v2>().getMensaje();
			mensaje.text = mensaje_act;
			}else{
				Time.timeScale = 1; 
				menu.SetActive(true);
				mensaje.text = string.Empty;
				panel.SetActive(false);
				actual_chest.SetActive(false);
			}
		}
	}


	IEnumerator espera()
    {
    	yield return new WaitForSeconds(3);
        //mensaje.SetActive(false);

    }


}