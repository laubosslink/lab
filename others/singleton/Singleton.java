
// La classe est final, car un singleton n'est pas censé avoir d'héritier.
 // En effet, en Java il n'y a pas de polymorphisme sur les méthodes static, il est
 // donc préférable de verrouiller la classe.
 public final class Singleton {
 
     // L'utilisation du mot clé volatile permet, en Java version 5 et supérieur, d'éviter le cas où "Singleton.instance" est non-nul,
     // mais pas encore "réellement" instancié.
     // De Java version 1.2 à 1.4, il est possible d'utiliser la classe ThreadLocal.
     private static volatile Singleton instance = null;
 
     // D'autres attributs, classiques et non "static".
     public int x;
 
     /**
      * Constructeur de l'objet.
      */
     private Singleton() {
         // La présence d'un constructeur privé supprime le constructeur public par défaut.
         // De plus, seul le singleton peut s'instancier lui même.
         super();
     }
 
     /**
      * Méthode permettant de renvoyer une instance de la classe Singleton
      * @return Retourne l'instance du singleton.
      */
     public final static Singleton getInstance() {
         //Le "Double-Checked Singleton"/"Singleton doublement vérifié" permet d'éviter un appel coûteux à synchronized, 
         //une fois que l'instanciation est faite.
         if (Singleton.instance == null) {
            // Le mot-clé synchronized sur ce bloc empêche toute instanciation multiple même par différents "threads".
            // Il est TRES important.
            synchronized(Singleton.class) {
              if (Singleton.instance == null) {
                Singleton.instance = new Singleton();
              }
            }
         }
         return Singleton.instance;
     }
 
 
	public static void main(String[] args){
		Singleton s = new Singleton();
		System.out.println("S (x origine) : " + s.x);
		s.x += 1;
		System.out.println("S (x+1) : " +s.x);
		
		Singleton s2 = new Singleton();
		System.out.println("S2 : " + s2.x);
	
		Singleton s3 = s;
		System.out.println("S3 : " + s3.getInstance().x);
		
		Singleton s4 = new Singleton();
		System.out.println("S4 (x origine) : " + s4.getInstance().x);
		s4.getInstance().x += 1; // Si s4.x += 1 ; on a :
		System.out.println("S4 (x+1) : " + s4.getInstance().x); // 0
		
		Singleton s5 = s4.getInstance();
		System.out.println("S5 : " + s5.getInstance().x); // 0
	
	}
 }
