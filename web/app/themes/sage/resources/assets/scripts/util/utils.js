/**
 * Classse d'utilitaires divers
 * Si une fonction peut être utiles pour une autre projet, on met ici
 */
export default class Utils {

  constructor() {
    //this.debug('Utils : construct')
  }

  /**
   *
   * @param cname
   * @param cvalue
   * @param exdays
   */
  static setCookie(cname, cvalue, exmin) {
    let d = new Date();
    d.setTime(d.getTime() + (exmin * 60 * 1000));
    let expires = 'expires=' + d.toUTCString();
    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
  }


  /**
   *
   * @param cname
   * @returns {*}
   */
  static getCookie(cname) {
    let name = cname + '=';
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return '';
  }
}
