public enum Season {
  	spring("Printemps"),summer("Eté"), automn("Automne"), winter("Hiver");

  	protected String label;

	/** Constructeur */
   	Season(String pLabel) {
      		this.label = pLabel;
   	}

   	public String getLabel() {
      		return this.label;
   	}

	 public static void method (Season season) {
                switch (season) {
                        case spring:
                                System.out.println("Les arbres sont en fleurs !!!");
                        break;
                        case summer:
                                System.out.println("Il fait chaud !!!");
                                break;
                        case automn:
                                System.out.println("Les feuilles tombent...");
                        break;
                        case winter:
                                System.out.println("Il neige !!!");
                        break;
                }

        }


	public static void main(String[] args){
	//	Season s = new Season("Hiver"); Invalide ! On ne peut l'instancier
		System.out.println("Season.sping : " + Season.spring);
		System.out.println("Season.sping.getLabel() : " + Season.spring.getLabel());
		Test.method(Season.spring);
		Season.method(Season.winter);
	}
}


